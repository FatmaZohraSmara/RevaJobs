<?php
class competence_services
{
    private static function valoriser($competence) 
    {
        $valeur = 0;
        $diff = 0;
        $date_debut = NULL;
        $date_fin = NULL;

        if($competence->type == 11)
        {
            $date_debut = new DateTime($competence->date_debut);
            $date_fin   = (isset($competence->date_fin) && strlen($competence->date_fin) > 0) ?
                          new DateTime($competence->date_fin) : 
                          new DateTime(date("Y-m-d H:i:s"));
            $diff = $date_debut->diff($date_fin)->format('%y');
        }

        switch($competence->type) 
        {
            case  1: $valeur = 1; break;
            case  2: $valeur = 1; break;
            case  3: $valeur = 1; break;
            case  4: $valeur = 1; break;
            case  5: $valeur = 1; break;
            case  6: $valeur = 1; break;
            case  7: $valeur = 2; break;
            case  8: $valeur = 2; break;
            case  9: $valeur = 2; break;
            case 10: $valeur = 2; break;
            case 11: { $valeur = $diff; } break;
            case 12: $valeur = 1; break;
            case 13: $valeur = 1; break;
        }

        return $valeur;
    }

    public static function ajouter($competence)
    {
        $etat_op = false;

        try 
        {
            var_dump($competence);
            // Valorisation et évaluation des compétences du candidat
            $a_diplome = ($competence->type >= 7 && $competence->type <= 10) ? 1 : 0;
            $val = self::valoriser($competence);

            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `competence`
                                              (`intitule_competence`, 
                                               `description_competence`, 
                                               `date_debut_competence`, 
                                               `date_fin_competence`, 
                                               `type_competence`, 
                                               `candidat_competence`) 
                                       VALUES (:inti, :dscr, :ddeb, :dfin, :typ_, :cand);

                                    UPDATE `utilisateur`
                                       SET `valeur_utilisateur` = `valeur_utilisateur` + :vale,
                                           `diplome_utilisateur` = `diplome_utilisateur` + :adip
                                     WHERE `id_utilisateur`     = :cand;');
            $stmt->bindParam(':inti', $competence->intitule);
            $stmt->bindParam(':dscr', $competence->description);
            $stmt->bindParam(':ddeb', $competence->date_debut);
            $stmt->bindParam(':dfin', $competence->date_fin);
            $stmt->bindParam(':typ_', $competence->type);
            $stmt->bindParam(':vale', $val);
            $stmt->bindParam(':adip', $a_diplome);
            $stmt->bindParam(':cand', $competence->candidat);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
            if($etat_op)
            {
                $user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: ../index.html');
                $user->valeur_utilisateur += $val;
                $user->diplome_utilisateur += $a_diplome;
                $_SESSION['connected'] = $user;
            }
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function supprimer($idcomp, $tpcomp, $idcand, $ddcomp, $dfcomp)
    {
        $etat_op = false;

        try 
        {
            // Préparation de la suppression
            // - Est-ce qu'il cherche à supprimer un diplôme
            // - Est-ce qu'il a plusieurs diplôme ?
            // - Est-ce qu'il s'agit d'une expérience
            // Valorisation et évaluation des compétences du candidat
            $competence = new competence();
            $competence->id = $idcomp;
            $competence->type = $tpcomp;
            $competence->candidat = $idcand;
            $competence->date_debut = $ddcomp;
            $competence->date_fin = $dfcomp;
            $diplome_a_supprimer = ($competence->type >= 7 && $competence->type <= 10) ? 1 : 0;
            $val = self::valoriser($competence);

            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('DELETE FROM `competence` WHERE `id_competence`= :id;
                                    UPDATE `utilisateur`
                                       SET `valeur_utilisateur` = `valeur_utilisateur` - :vale,
                                           `diplome_utilisateur` = `diplome_utilisateur` - :adip
                                     WHERE `id_utilisateur`     = :cand;');
            $stmt->bindParam(':id', $competence->id);
            $stmt->bindParam(':vale', $val);
            $stmt->bindParam(':adip', $diplome_a_supprimer);
            $stmt->bindParam(':cand', $competence->candidat);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        }
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function modifier($competence)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `competence` 
                                      SET `intitule_competence`         = :inti,
                                          `description_competence`      = :dscr,
                                          `niveau_competence`           = :nive,
                                          `date_debut_competence`       = :ddcp,
                                          `date_fin_competence`         = :dfcp,
                                          `type_competence`             = :typ_,
                                          `candidat_competence`         = :cand
                                    WHERE `id_competence`               = :id__');
            $stmt->bindParam(':id__' ,$competence->id);
            $stmt->bindParam(':inti' ,$competence->intitule);
            $stmt->bindParam(':dscr' ,$competence->description);
            $stmt->bindParam(':nive' ,$competence->niveau);
            $stmt->bindParam(':ddcp' ,$competence->date_debut);
            $stmt->bindParam(':dfcp' ,$competence->date_fin);
            $stmt->bindParam(':typ_' ,$competence->type);
            $stmt->bindParam(':cand' ,$competence->candidat);

            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        }
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function consulter($id)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `competence` WHERE `id_competence`= :id');
            $stmt->bindParam(':id' , $id);
            $stmt->execute();
            if(isset($stmt) && $stmt !== false && $stmt->rowCount() > 0) 
            { 
                $resultat = $stmt->fetchObject();
            }
            
        } 
        catch (Exception $exception)
        {
            exception_lib::treat_exception($exception);
        }

        return $resultat;
    }

    public static function lister($idcandidat)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `competence` WHERE `candidat_competence` = :idc');
            $stmt->bindParam(':idc' , $idcandidat);
            $stmt->execute();
           
            if(isset($stmt) && $stmt !== false && $stmt->rowCount() > 0) 
            { 
                $resultat = $stmt;
            }
        }
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $resultat;
    }
}
<?php
class competence_services
{
    public static function ajouter($competence)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `competence`
                                              (`intitule_competence`, 
                                               `description_competence`, 
                                               `niveau_competence`, 
                                               `date_debut_competence`, 
                                               `date_fin_competence`, 
                                               `type_competence`, 
                                               `candidat_competence`) 
                                       VALUES (:inti, :dscr, :nive, :ddeb, :dfin, :typ_, :cand)');
          
            $stmt->bindParam(':inti', $competence->intitule);
            $stmt->bindParam(':dscr', $competence->description);
            $stmt->bindParam(':nive', $competence->niveau);
            $stmt->bindParam(':ddeb', $competence->date_debut);
            $stmt->bindParam(':dfin', $competence->date_fin);
            $stmt->bindParam(':typ_', $competence->type);
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

    public static function supprimer($id)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('DELETE FROM `competence` WHERE `id_competence`= :id');
            $stmt->bindParam(':id', $id);
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
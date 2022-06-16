<?php
class candidature_services
{
    public static function ajouter($candidature)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `candidature`
                                              (`numero_soumission_cantidature`, 
                                               `candidat_candidature`, 
                                               `offre_candidature`) 
                                        VALUES (:nsou, :cand, :offr)');
            $stmt->bindParam(':nsou', $candidature->numero_soumission);
            $stmt->bindParam(':cand', $candidature->candidat);
            $stmt->bindParam(':offr', $candidature->offre);
            
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function modifier($candidature)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `candidature` 
                                     SET  `evaluation_cantidature`     = :eval,
                                          `date_reponse_cantidature`   = :drep,
                                          `reponse_cantidature`        = :repo,
                                          `date_entretien_cantidature` = :dent
                                    WHERE `id_candidature`             = :id__');
                                  
            $stmt->bindParam(':id__', $candidature->id);
            $stmt->bindParam(':eval', $candidature->evaluation);
            $stmt->bindParam(':drep', $candidature->date_reponse);
            $stmt->bindParam(':repo', $candidature->reponse);
            $stmt->bindParam(':dent', $candidature->date_entretien);

            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);

        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function modifier_etat($id, $etat)
    {
        $etat_op = false;
        try
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `candidature` 
                                      SET `etat_cantidature` = :etat 
                                    WHERE `id_candidature` = :id');          
            $stmt->bindParam(':etat', $etat);
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

    public static function supprimer($id)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('DELETE FROM `candidature` WHERE `id_candidature` = :id');
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

    public static function consulter($candidature)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `candidature` WHERE `id_candidature` = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $resultat = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0) ? $stmt->fetchObject() : $resultat;
        }  
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $resultat;
    }
       

    public static function lister($idc, $ido)
    {
        $resultat = NULL;
        $req = '';

        try 
        {
            $req = 'SELECT * FROM `candidature` ';

            if($idc > 0 && $ido == 0) 
            { 
                $req .= 'WHERE `candidat_candidature` = :idc'; 
                $stmt->bindParam(':idc', $idc);
            }
            else 
                if($idc == 0 && $ido > 0) 
                { 
                    $req .= 'WHERE `offre_candidature` = :ido'; 
                    $stmt->bindParam(':ido', $ido);
                }
                else
                    if($idc > 0 && $ido > 0)  
                    { 
                        $req .= 'WHERE `candidat_candidature` = :idc AND `offre_candidature` = :ido'; 
                        $stmt->bindParam(':idc', $idc);
                        $stmt->bindParam(':ido', $ido);
                    }
            
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare($req);
            $stmt->execute();
            $resultat = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0) ? $stmt : $resultat;
        }  
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $resultat;
    }
}
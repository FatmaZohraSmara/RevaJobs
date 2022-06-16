<?php
class test_services
{
    public static function ajouter($test)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `test`
                                              (`ennonce_test`, 
                                               `image_test`, 
                                               `reponse1_test`, 
                                               `reponse2_test`, 
                                               `reponse3_test`, 
                                               `reponse_valide_test`, 
                                               `numero_soumission_test`, 
                                               `date_soumission_test`, 
                                               `offre_test`)
                                        VALUES (:enno, :imge, :rep1, :rep2,
                                                :rep3, :repv, :nsou, :dsou, :offr)');

            $stmt->bindParam(':enno', $test->ennonce);
            $stmt->bindParam(':imge', $test->image);
            $stmt->bindParam(':rep1', $test->reponse1);
            $stmt->bindParam(':rep2', $test->reponse2);
            $stmt->bindParam(':rep3', $test->reponse3);
            $stmt->bindParam(':repv', $test->reponse_valide);
            $stmt->bindParam(':nsou', $test->numero_soumission);
            $stmt->bindParam(':dsou', $test->date_soumission);
            $stmt->bindParam(':offr', $test->offre);

            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }

    public static function modifier($test)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `test` 
                                      SET `ennonce_test`          = :enno,
                                          `image_test`            = :imge,
                                          `reponse1_test`         = :rep1,
                                          `reponse2_test`         = :rep2,
                                          `reponse3_test`         = :rep3,
                                          `reponse_valide_test`   = :repv,
                                          `numero_soumission_test`= :nsou,
                                          `date_soumission_test`  = :dsou, 
                                          `offre_test`            = :offr
                                    WHERE `id_test`               = :id__');
            $stmt->bindParam(':id__', $test->id);
            $stmt->bindParam(':enno', $test->ennonce);
            $stmt->bindParam(':imge', $test->image);
            $stmt->bindParam(':rep1', $test->reponse1);
            $stmt->bindParam(':rep2', $test->reponse2);
            $stmt->bindParam(':rep3', $test->reponse3);
            $stmt->bindParam(':repv', $test->reponse_valide);
            $stmt->bindParam(':nsou', $test->numero_soumission);
            $stmt->bindParam(':dsou', $test->date_soumission);
            $stmt->bindParam(':offr', $test->offre);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } catch (Exception $exception)
        {
            exception_lib::treat_exception($exception);
        }

        return $resultat;
    }

    
    public static function supprimer($id)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('DELETE FROM `test` WHERE `id_test` = :id');
            $stmt->bindParam(':id' , $id);
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
            $stmt = $pdo->prepare('SELECT * FROM `test` WHERE `id_test`= :id');
            $stmt->bindParam(':id', $id);
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

    public static function lister($idoffre)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `test` WHERE `offre_test` = :ido');
            $stmt->bindParam(':ido' , $idoffre);
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
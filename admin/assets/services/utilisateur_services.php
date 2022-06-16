<?php
class utilisateur_services
{
    public static function ajouter($utilisateur)
    {
        $etat_op = false;

        try 
        {

            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `utilisateur`
                                              (`prenon_utilisateur`, 
                                               `nom_utilisateur`, 
                                               `date_naissance_utilisateur`, 
                                               `mobile_utilisateur`, 
                                               `email_utilisateur`, 
                                               `adresse_utilisateur`, 
                                               `code_postal_utilisateur`, 
                                               `situation_familliale_utilisateur`, 
                                               `numero_inscription_utilisateur`, 
                                               `date_inscription_utilisateur`, 
                                               `login_utilisateur`, 
                                               `password_utilisateur`, 
                                               `type_utilisateur`, 
                                               `etat_utilisateur`) 
                                        VALUES (:pren, :nom_, :dnai, :mobi, :emai, :adrs, :cpos, 
                                                :sitf, :nins, :dins, :logn, :pswr, :typ_, :etat)');
            $stmt->bindParam(':pren' ,$utilisateur->prenon);
            $stmt->bindParam(':nom_' ,$utilisateur->nom);
            $stmt->bindParam(':dnai' ,$utilisateur->date_naissance);
            $stmt->bindParam(':mobi' ,$utilisateur->mobile);
            $stmt->bindParam(':emai' ,$utilisateur->email);
            $stmt->bindParam(':adrs' ,$utilisateur->adresse);
            $stmt->bindParam(':cpos' ,$utilisateur->code_postal);
            $stmt->bindParam(':sitf' ,$utilisateur->situation_familliale);
            $stmt->bindParam(':nins' ,$utilisateur->numero_inscription);
            $stmt->bindParam(':dins' ,$utilisateur->date_inscription);
            $stmt->bindParam(':logn' ,$utilisateur->login);
            $stmt->bindParam(':pswr' ,$utilisateur->password);
            $stmt->bindParam(':typ_' ,$utilisateur->type);
            $stmt->bindParam(':etat' ,$utilisateur->etat);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    } 

    public static function modifier($utilisateur)
    {
        $etat_op = false;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `utilisateur` 
                                     SET  `prenon_utilisateur`               = :pren,
                                          `nom_utilisateur`                  = :nom_,
                                          `date_naissance_utilisateur`       = :dtns,
                                          `mobile_utilisateur`               = :mobi,
                                          `email_utilisateur`                = :emai,
                                          `adresse_utilisateur`              = :adrs,
                                          `code_postal_utilisateur`          = :cdps,
                                          `situation_familliale_utilisateur` = :stfm,
                                          `password_utilisateur`             = :pswr
                                    WHERE `id_utilisateur`                   = :id__');
            $stmt->bindParam(':id__', $utilisateur->id                  );
            $stmt->bindParam(':pren', $utilisateur->prenon              );
            $stmt->bindParam(':nom_', $utilisateur->nom                 );
            $stmt->bindParam(':dtns', $utilisateur->date_naissance      );
            $stmt->bindParam(':mobi', $utilisateur->mobile              );
            $stmt->bindParam(':emai', $utilisateur->email               );
            $stmt->bindParam(':adrs', $utilisateur->adresse             );
            $stmt->bindParam(':cdps', $utilisateur->code_postal         );
            $stmt->bindParam(':stfm', $utilisateur->situation_familliale);
            $stmt->bindParam(':pswr', $utilisateur->password            );
            
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
            $stmt = $pdo->prepare('UPDATE `utilisateur` 
                                      SET `etat_utilisateur` = :etat 
                                    WHERE `id_utilisateur` = :id');          
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
            $stmt = $pdo->prepare('DELETE FROM `utilisateur` WHERE `id_utilisateur` = :id');
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
            $stmt = $pdo->prepare('SELECT * FROM `utilisateur` WHERE `id_utilisateur` = :id');
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

    public static function lister($etat, $type)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * 
                                     FROM `utilisateur` 
                                    wHERE `etat_utilisateur` = :eta AND 
                                          `type_utilisateur` = :typ');
            $stmt->bindParam(':eta' , $etat);
            $stmt->bindParam(':typ' , $type);
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

    public static function _lister($etat, $cdp)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * 
                                     FROM `utilisateur` 
                                    wHERE `etat_utilisateur` = :etat AND 
                                          `code_postal_utilisateur` = :cdp');
            $stmt->bindParam(':etat' , $etat);
            $stmt->bindParam(':cdp' , $cdp);
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

    public static function chercher($info)
    {
        $resultat = NULL;

        try 
        {
            $info = '%'.$info.'%';
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * 
                                     FROM `utilisateur` 
                                    WHERE `prenon_utilisateur`             LIKE :info OR
                                          `nom_utilisateur`                LIKE :info OR
                                          `mobile_utilisateur`             LIKE :info OR
                                          `email_utilisateur`              LIKE :info OR
                                          `adresse_utilisateur`            LIKE :info OR
                                          `code_postal_utilisateur`        LIKE :info OR
                                          `numero_inscription_utilisateur` LIKE :info');
            $stmt->bindParam(':info' , $info);
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

    public static function connecter ($login, $password)
    {
        $resultat = NULL;
        try 
        {
            echo $login;
            echo $password;
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `utilisateur`
                                           WHERE `login_utilisateur`    LIKE :logn AND 
                                                 `password_utilisateur` LIKE :pswr');
            $stmt->bindParam(':logn' , $login);
            $stmt->bindParam(':pswr' , $password);

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

    public static function deconnecter()
    {
        $resultat = NULL;
        try 
        {
            session_regenerate_id();
            session_destroy();
            header('location: ../../../index.html');
            die();
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }
        return $resultat;
}




}


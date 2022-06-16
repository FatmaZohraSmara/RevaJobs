<?php
class organisme_services
{
    public static function ajouter($organisme)
    {
        $etat_op = false;

        try {
            
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `organisme`
                                              (`raison_sociale_organisme`, 
                                               `logo_organisme`, 
                                               `specialite_organisme`, 
                                               `fixe_organisme`, 
                                               `fax_organisme`, 
                                               `email_organisme`, 
                                               `adresse_organisme`, 
                                               `code_postal_organisme`, 
                                               `nrc_organisme`, 
                                               `rib_organisme`, 
                                               `numero_soumission_organisme`, 
                                               `date_soumission_organisme`, 
                                               `etat_organisme`, 
                                               `recruteur_organisme`) 
                                       VALUES (:rais, :logo, :spec, :fixe, :fax_, 
                                               :emai, :adrs, :cpos, :nrc_, :rib_, :nsou, 
                                               :dsou, :etat, :recr)');
            
            $stmt->bindParam(':rais', $organisme->raison_sociale);
            $stmt->bindParam(':logo', $organisme->logo);
            $stmt->bindParam(':spec', $organisme->specialite);
            $stmt->bindParam(':fixe', $organisme->fixe);
            $stmt->bindParam(':fax_', $organisme->fax);
            $stmt->bindParam(':emai', $organisme->email);
            $stmt->bindParam(':adrs', $organisme->adresse);
            $stmt->bindParam(':cpos', $organisme->code_postal);
            $stmt->bindParam(':nrc_', $organisme->nrc);
            $stmt->bindParam(':rib_', $organisme->rib);
            $stmt->bindParam(':nsou', $organisme->numero_soumissiom);
            $stmt->bindParam(':dsou', $organisme->date_soumissiom);
            $stmt->bindParam(':etat', $organisme->etat);
            $stmt->bindParam(':recr', $organisme->recruteur);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }
    

    public static function modifier($organisme)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `organisme` 
                                     SET  `raison_sociale_organisme`   = :rsoc,
                                          `logo_organisme`             = :logo,
                                          `specialite_organisme`       = :spec,
                                          `fixe_organisme`             = :fixe,
                                          `fax_organisme`              = :fax_,
                                          `email_organisme`            = :emai,
                                          `adresse_organisme`          = :adrs,
                                          `code_postal_organisme`      = :cdps,
                                          `nrc_organisme`              = :nrc_,
                                          `rib_organisme`              = :rib_,
                                          `numero_soumission_organisme`= :nsou,
                                          `date_soumission_organisme`  = :dsou,
                                          `etat_organisme`             = :etat,
                                          `recruteur_organisme`        = :recr 
                                    WHERE `id_organisme`               = :id__');
                                    
            $stmt->bindParam(':id__', $organisme->id);
            $stmt->bindParam(':rsoc', $organisme->raison_sociale);
            $stmt->bindParam(':logo', $organisme->logo);
            $stmt->bindParam(':spec', $organisme->specialite);
            $stmt->bindParam(':fixe', $organisme->fixe);
            $stmt->bindParam(':fax_', $organisme->fax);
            $stmt->bindParam(':emai', $organisme->email);
            $stmt->bindParam(':adrs', $organisme->adresse);
            $stmt->bindParam(':cdps', $organisme->code_postal);
            $stmt->bindParam(':nrc_', $organisme->nrc);
            $stmt->bindParam(':rib_', $organisme->rib);
            $stmt->bindParam(':nsou', $organisme->numero_soumissiom);
            $stmt->bindParam(':dsou', $organisme->date_soumissiom);
            $stmt->bindParam(':etat', $organisme->etat);
            $stmt->bindParam(':recr', $organisme->recruteur);
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);                        
        } catch (Exception $exception)  {
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
            $stmt = $pdo->prepare('UPDATE `organisme` 
                                      SET `etat_organisme`= :etat 
                                    WHERE `id_organisme`  = :id');          
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
            $stmt = $pdo->prepare('DELETE FROM `organisme` WHERE `id_organisme` = :id');
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

    public static function consulter($id)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `organisme` WHERE `id_organisme` = :id');
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

    public static function lister_par_etat($etat)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `organisme` WHERE `etat_organisme` = :etat');
            $stmt->bindParam(':etat', $etat);
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

    public static function lister_par_code_postal($cdp)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `organisme` WHERE `code_postal_organisme` = :cdp AND `etat_organisme` = 1');
            $stmt->bindParam(':cdp', $cdp);
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
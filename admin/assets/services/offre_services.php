<?php
class offre_services
{
    public static function ajouter($offre)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('INSERT INTO `offre`
                                             (`intitule_poste_offre`, 
                                              `description_offre`, 
                                              `coordonnees_offre`, 
                                              `date_debut_offre`, 
                                              `date_fin_offre`, 
                                              `bareme_minimaum_offre`, 
                                              `domaine_offre`, 
                                              `numero_soumission_offre`, 
                                              `date_soumission_offre`, 
                                              `organisme_offre`)
                                       VALUES (:inti, :dscr, :coor, :ddeb, :dfin, 
                                               :bmin, :doma, :nsou, :dsou, :orga)');
            $stmt->bindParam(':inti', $offre->intitule);
            $stmt->bindParam(':dscr', $offre->description);
            $stmt->bindParam(':coor', $offre->coordonnees);
            $stmt->bindParam(':ddeb', $offre->date_debut);
            $stmt->bindParam(':dfin', $offre->date_fin);
            $stmt->bindParam(':bmin', $offre->bareme_minimaum);
            $stmt->bindParam(':doma', $offre->domaine);
            $stmt->bindParam(':nsou', $offre->numero_soumission);
            $stmt->bindParam(':dsou', $offre->date_soumission);
            $stmt->bindParam(':orga', $offre->organisme);
       
            $stmt->execute();
            $etat_op = (isset($stmt) && $stmt !== false && $stmt->rowCount() > 0);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $etat_op;
    }
        
    public static function modifier($offre)
    {
        $etat_op = false;

        try {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('UPDATE `offre` 
                                      SET `intitule_poste_offre`   = :inti,
                                          `description_offre`      = :dscr,
                                          `coordonnees_offre`      = :coor,
                                          `date_debut_offre`       = :ddeb,
                                          `date_fin_offre`         = :dfin,
                                          `bareme_minimaum_offre`  = :bmin,
                                          `domaine_offre           = :doma,
                                          `numero_soumission_offre`= :nsou,
                                          `date_soumission_offre  = :dsou,
                                          `organisme_offre`        = :orga
                                    WHERE `id_utilisateur`         = :id__');
            $stmt->bindParam(':id__', $offre->id               );
            $stmt->bindParam(':inti', $offre->intitule         );
            $stmt->bindParam(':dscr', $offre->description      );
            $stmt->bindParam(':coor', $offre->coordonnees      );
            $stmt->bindParam(':ddeb', $offre->date_debut       );
            $stmt->bindParam(':dfin', $offre->date_fin         );
            $stmt->bindParam(':bmin', $offre->bareme_minimaum  );
            $stmt->bindParam(':doma', $offre->domaine          );
            $stmt->bindParam(':nsou', $offre->numero_soumission);
            $stmt->bindParam(':dsou', $offre->date_soumission  );
            $stmt->bindParam(':orga', $offre->organisme        );
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
            $stmt = $pdo->prepare('DELETE FROM `offre` WHERE `id_offre` = :id');
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
            $stmt = $pdo->prepare('SELECT * FROM `offre` WHERE `id_offre` = :id');
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

    public static function chercher($info)
    {
        $resultat = NULL;

        try 
        {
            $info = '%'.$info.'%';
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * 
                                     FROM `offre` 
                                    WHERE (NOW() BETWEEN `date_debut_offre` AND `date_fin_offre`) AND
                                          (`intitule_poste_offre`    LIKE :info OR
                                           `description_offre`       LIKE :info OR
                                           `coordonnees_offre`       LIKE :info OR
                                           `domaine_offre`           LIKE :info OR
                                           `numero_soumission_offre` LIKE :info)
                                 ORDER BY `id_offre` DESC');
            $stmt->bindParam(':info', $info);
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

    public static function lister()
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * 
                                     FROM `offre` 
                                    WHERE NOW() BETWEEN `date_debut_offre` AND `date_fin_offre`
                                    ORDER BY `id_offre` DESC');
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

    public static function lister_par_organisme($ido)
    {
        $resultat = NULL;

        try 
        {
            $pdo = database_lib::generate_pdo_object();
            $stmt = $pdo->prepare('SELECT * FROM `offre` WHERE `organisme_offre` = :ido');
            $stmt->bindParam(':ido' , $ido);
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
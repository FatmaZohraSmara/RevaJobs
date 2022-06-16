<?php
class offre_displays
{
    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new offre();
            $object->id                = isset($_POST['id__']) ? $_POST['id__'] : 2;
            $object->intitule          = isset($_POST['inti']) ? $_POST['inti'] : "Lorem ipsum set amet dolor";
            $object->description       = isset($_POST['dscr']) ? $_POST['dscr'] : "Lorem ipsum set amet dolor";
            $object->coordonnees       = isset($_POST['coor']) ? $_POST['coor'] : "Lorem ipsum set amet dolor";
            $object->date_debut        = isset($_POST['ddeb']) ? $_POST['ddeb'] : NULL;
            $object->date_fin          = isset($_POST['dfin']) ? $_POST['dfin'] : NULL;
            $object->bareme_minimaum   = isset($_POST['bmin']) ? $_POST['bmin'] : 200;
            $object->domaine           = isset($_POST['doma']) ? $_POST['doma'] : "TAT";
            $object->numero_soumission = isset($_POST['nsou']) ? $_POST['nsou'] : strings_lib::generate_number();
            $object->date_soumission   = isset($_POST['dsou']) ? $_POST['dsou'] : date("Y-m-d H:i:s");
			$object->organisme         = isset($_POST['orga']) ? $_POST['orga'] : 1; 
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

        return $object;
	}

	public static function display_one($object) // Consulter
	{
		$htm = '';

		try
		{
			if($object !== FALSE)
			{ 
				$htm = '<p>'.htmlentities($object->intitule_poste_offre).'</p>';
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_line($object)
	{
		$htm = '';

		try
		{
			if($object !== FALSE)
			{ 
				$htm = '
				<div id="off'.$object->id_offre.'" 
				     style="font-size: 13px; padding: 10px 0px 10px 30px; border-top: solid 1px #ccc;">
					<strong>'.htmlentities($object->intitule_poste_offre).'</strong><br>
					<ul>
						<li>Numéro : '.htmlentities($object->numero_soumission_offre).'</li>
						<li>Publiée le : '.$object->date_soumission_offre.'</li>
						<li>Dernier délai : '.$object->date_fin_offre.'</li>
						<li>Domaine : '.htmlentities($object->domaine_offre).'</li>
						<li>Score de compétence demandée : '.htmlentities($object->bareme_minimaum_offre).'</li>
					</ul>
					<span>Description</span><br>
					<p>'.htmlentities($object->description_offre).'</p>
					<span>Coordonnées</span><br>
					<p>'.htmlentities($object->coordonnees_offre).'</p>
					<div style="text-align: right;">
						<button id="btn-postuler-'.$object->id_offre.'"
								type="button" 
								onclick="ajouter_candidature('.$object->id_offre.', '.$object->type_offre.', '.$object->bareme_minimaum_offre.');"
						        class="btn btn-outline-primary m-2">
							<i class="fa fa-check me-2"></i>
							Postuler
						</button>
					</div>
				</div>';
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_list($list, $title)
	{
		$htm = '<h3>'.$title.'</h3>';
		
		try
		{
			if(isset($list) && $list !== false && $list->rowCount() > 0)
			{ 
				while($object = $list->fetchObject())
				{
					$htm .= self::display_line($object);
				}
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_line_admin($object)
	{
		$htm = '';

		try
		{
			if($object !== FALSE)
			{ 
				$htm = '
				<div id="off'.$object->id_offre.'" 
				     style="font-size: 13px; padding: 10px 0px 10px 30px; border-top: solid 1px #ccc;">
					<strong>'.htmlentities($object->intitule_poste_offre).'</strong><br>
					<ul>
						<li>Numéro : '.htmlentities($object->numero_soumission_offre).'</li>
						<li>Publiée le : '.$object->date_soumission_offre.'</li>
						<li>DERNIER DELAI : '.$object->date_debut_offre.' - '.$object->date_fin_offre.'</li>
						<li>Domaine : '.htmlentities($object->domaine_offre).'</li>
					</ul>
					<span>Description</span><br>
					<p>'.htmlentities($object->description_offre).'</p>
					<span>Coordonnées</span><br>
					<p>'.htmlentities($object->coordonnees_offre).'</p>
					<div style="text-align: right;">
						<button type="button" 
								onclick="supprimer_offre('.$object->id_offre.');"
								class="btn btn-square btn-outline-danger m-2">
							<i class="fa fa-trash"></i>
						</button>
					</div>
				</div>';
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_list_admin($list)
	{
		$htm = '<h3>Offres en vigueur</h3>';
		
		try
		{
			if(isset($list) && $list !== false && $list->rowCount() > 0)
			{ 
				while($object = $list->fetchObject())
				{
					$htm .= self::display_line_admin($object);
				}
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}
}
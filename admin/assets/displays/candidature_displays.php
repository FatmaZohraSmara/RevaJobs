<?php
class candidature_displays
{
	public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new candidature();
            $object->id                 = isset($_POST['id__']) ? $_POST['id__'] : 2;
            $object->evaluation         = isset($_POST['valeur']) ? $_POST['valeur'] : 10;
            $object->date_reponse       = isset($_POST['drep']) ? $_POST['drep'] : NULL;
            $object->reponse            = isset($_POST['repn']) ? $_POST['repn'] : "TEST";
            $object->date_entretien     = isset($_POST['dent']) ? $_POST['dent'] : NULL;
            $object->numero_soumission  = isset($_POST['nsou']) ? $_POST['nsou'] : strings_lib::generate_number();
            $object->date_soumission    = isset($_POST['dsou']) ? $_POST['dsou'] : date("Y-m-d H:i:s");
            $object->etat               = isset($_POST['etat']) ? $_POST['etat'] : 1;
            $object->candidat           = isset($_POST['idcon']) ? $_POST['idcon'] : 1;
            $object->offre              = isset($_POST['idoff']) ? $_POST['idoff'] : 1;            
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
				$htm = '<p>'.htmlentities($object->numero_soumission_cantidature).'</p>';
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
				<div style="margin: 10px 0px; padding: 10px 0px;">
					<div style="padding: 10px; background-color: #f0f0f0;"
						 onclick="$(\'div#cand'.$object->id_candidature.'\').toggle();"
					 	 style="cursor: pointer;"
					 	 title="Voir plus">
						<b>CONDIDATURE N°'.htmlentities($object->numero_soumission_cantidature).' -> 
							'.self::display_label_state($object->etat_cantidature).'</b><br>
						<small>SOUMISE LE : '.htmlentities($object->date_soumission_cantidature).'</small>
					</div>
					<div id="cand'.$object->id_candidature.'" 
						 style="padding: 10px; background-color: transparent; display: none;">
						<b>POSTE : </b>
						<ul>
							<li>Intitulé poste : '.htmlentities($object->intitule_poste_offre).'</li>
							<li>Entreprise     : '.htmlentities($object->raison_sociale_organisme).'</li>
							<li>Coordonnées    : '.htmlentities($object->coordonnees_offre).'</li>
							<li>Valide jusqu\'au : '.htmlentities($object->date_fin_offre).'
						</ul>
						<p>'.htmlentities($object->description_offre).'</p>
						<b>REPONSE : </b>
						<ul>
							<li>Date réponse   : '.htmlentities($object->date_reponse_cantidature).'</li>
							<li>Date entretien : '.htmlentities($object->date_entretien_cantidature).'</li>
						</ul>
						<p>'.htmlentities($object->reponse_cantidature).'</p>
						<div style="text-align: right;">
							<button type="button" 
									onclick="supprimer_candidature('.$object->id_candidature.');"
									class="btn btn-square btn-outline-danger m-2">
								<i class="fa fa-trash"></i>
							</button>
						</div>
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
		catch (Exception $exception) 
		{
		    exception_lib::treat_exception($exception);
		}

		return $htm;
	}
	private static function display_label_state($code)
    {
    	$label = "";
    	try 
    	{
    		switch($code)
    		{
    			case 0: $label = '<small style="color: #dc0000;">ARCHIVE</small>'; break;
    			case 1: $label = '<small style="color: #0000dc;">EN COURS</small>'; break;
				case 2: $label = '<small style="color: #00dc00;">ACCEPTE</small>'; break;
    		}
    	} 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }
    	return $label;
    }
}
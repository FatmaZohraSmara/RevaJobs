<?php
class competence_displays
{
	private static function convert_type_label($type) {
		$label = '';

		switch($type){
			case  1: $label = "Langue A1";  break;
			case  3: $label = "langue A2";  break;
			case  4: $label = "langue B1";  break;
			case  5: $label = "langue B2";  break;
			case  6: $label = "langue C1";  break;
			case  7: $label = "Langue C2";  break;
			case  8: $label = "Licence";    break;
			case  9: $label = "Master";     break;
			case 10: $label = "Doctorat";   break;
			case 11: $label = "Expérience"; break;
			case 12: $label = "Maîtrise";   break;
			case 13: $label = "Autres";     break;
		}

		return $label;
	}

    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new competence();
            $object->id          = isset($_POST['id__']) ? $_POST['id__'] : 1;
            $object->intitule    = isset($_POST['inti']) ? $_POST['inti'] : "TESTE";
            $object->description = isset($_POST['dscr']) ? $_POST['dscr'] : "TEXTE";
            $object->date_debut  = isset($_POST['ddeb']) ? $_POST['ddeb'] : NULL;
            $object->date_fin    = isset($_POST['dfin']) ? $_POST['dfin'] : NULL;
            $object->type        = isset($_POST['typ_']) ? $_POST['typ_'] : 1;
            $object->candidat    = isset($_POST['cand']) ? $_POST['cand'] : 0;
           
                     
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
				$htm = '<p>'.htmlentities($object->intitule_competence).'</p>';
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
						 onclick="$(\'div#comp'.$object->id_competence.'\').toggle();"
					 	 style="cursor: pointer;"
					 	 title="Voir plus">
						<b>'.htmlentities($object->intitule_competence).' - 
							'.self::convert_type_label($object->type_competence).'</b><br>
						<span>Du '.htmlentities($object->date_debut_competence).' Au '.htmlentities($object->date_fin_competence).'</spans
					</div>
					<div id="comp'.$object->id_competence.'" 
						 style="padding: 10px; background-color: transparent; display: none;">
						<b>POSTE : </b>
						<p>'.htmlentities($object->description_competence).'</p>
						<div style="text-align: right;">
							<button type="button" 
									onclick="supprimer_competence('.$object->id_competence.', 
																  '.$object->type_competence.', 
																  '.$object->candidat_competence.', 
																  \''.$object->date_debut_competence.'\',
																  \''.$object->date_fin_competence.'\');"
									class="btn btn-square btn-outline-danger m-2">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
				</div>';
				/*
				$htm = '
				<div id="comp'.$object->id_competence.'" 
				     style="font-size: 13px; padding: 10px 0px 10px 30px; border-top: solid 1px #ccc;">
					<strong>'.htmlentities($object->intitule_competence).'</strong><br>
					<ul>
						<li>Durée           : '.$object->date_debut_competence.' - '.$object->date_fin_competence.'</li>

					</ul>
					<p>'.$object->date_debut_competence.'</p>
					<div style="text-align: right;">
						<!--button type="button" 
								onclick="supprimer_competence('.$object->id_competence.');"
						        class="btn btn-outline-primary m-2">
							<i class="fa fa-check me-2"></i>
							Postuler
						</button-->
					</div>
				</div>';*/
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
		$htm = '
		<table style="width: 100%;">
			<tr>
				<td><h3>'.$title.'</h3></td>
				<td style="text-align: right;">
					<button type="button" 
					onclick="load_content(\'div#displays\', \'form_ajouter_competence.php\');"
					class="btn btn-outline-primary m-2">
				    	<i class="fa fa-plus-circle me-2"></i>
				    	Ajouter
			        </button>					
				</td>
			</tr>
		</table>';
		
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
}
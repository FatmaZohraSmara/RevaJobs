<?php
class organisme_displays
{
   
    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new organisme();
            $object->id                = isset($_POST['id__']) ? $_POST['id__'] : 3;
            $object->raison_sociale    = isset($_POST['rais']) ? $_POST['rais'] : "Lorem ipsum set amet dolor";
            $object->logo              = isset($_POST['logo']) ? $_POST['logo'] : "default_logo.png";
            $object->specialite        = isset($_POST['spec']) ? $_POST['spec'] : "Lorem ipsum set amet dolor";
            $object->fixe              = isset($_POST['fixe']) ? $_POST['fixe'] : "0669873542";
            $object->fax               = isset($_POST['fax_']) ? $_POST['fax_'] : "0684736625";
            $object->email             = isset($_POST['emai']) ? $_POST['emai'] : "Lorem ipsum set amet dolor";
            $object->adresse           = isset($_POST['adrs']) ? $_POST['adrs'] : "Lorem ipsum set amet dolor";
            $object->code_postal       = isset($_POST['cpos']) ? $_POST['cpos'] : "12345";
			$object->nrc               = isset($_POST['nrc_']) ? $_POST['nrc_'] : "Lorem ipsum set amet dolor";
			$object->rib               = isset($_POST['rib_']) ? $_POST['rib_'] : "Lorem ipsum set amet dolor";
			$object->numero_soumissiom = isset($_POST['nsou']) ? $_POST['nsou'] : strings_lib::generate_number();
			$object->date_soumissiom   = isset($_POST['dsou']) ? $_POST['dsou'] : date("Y-m-d H:i:s");
			$object->etat              = isset($_POST['etat']) ? $_POST['etat'] : 1;
			$object->recruteur         = isset($_POST['recr']) ? $_POST['recr'] : 1;
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
				$htm = '<p>'.htmlentities($object->numero_soumission_organisme).'</p>';
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
				<div id="org'.$object->id_organisme.'" style="border-top: solid 1px #ccc; margin: 10px 0px; padding: 10px 0px;">
					<table style="width: 100%;">
						<tr>
							<td style="width: 10%; vertical-align: top; text-align: center;">
								<img src="uploads/'.htmlentities($object->logo_organisme).'" 
									 alt="Logo de '.htmlentities($object->raison_sociale_organisme).'" 
									 style="width: 100px; height: 100px; object-fit: cover;">
							</td>
							<td style="width: 90%; vertical-align: top;">
								<strong>'.htmlentities($object->raison_sociale_organisme).' ('.self::display_label_state($object->etat_organisme).')</strong>
								<ul>
									<li>NRC : '.htmlentities($object->nrc_organisme).'</li>
									<li>FIXE : '.htmlentities($object->fixe_organisme).'</li>
									<li>FAX : '.htmlentities($object->fax_organisme).'</li>
									<li>EMAIL : '.htmlentities($object->email_organisme).'</li>
									<li>ADRRESSE : '.htmlentities($object->adresse_organisme).'</li>
								</ul>
								<p>'.htmlentities($object->specialite_organisme).'</p>
								<div style="text-align: right;">
									<button type="button"
											onclick="modifier_etat_organisme('.$object->id_organisme.', 0);"
											class="btn btn-square btn-outline-info m-2">
										<i class="fa fa-stop"></i>
									</button>
									<button type="button"
											onclick="modifier_etat_organisme('.$object->id_organisme.', 1);"
											class="btn btn-square btn-outline-info m-2">
										<i class="fa fa-check-circle"></i>
									</button>
									<button type="button" 
											onclick="supprimer_organisme('.$object->id_organisme.');"
											class="btn btn-square btn-outline-danger m-2">
										<i class="fa fa-trash"></i>
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>';
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_line_for_recruteur($object)
	{
		$htm = '';

		try
		{
			if($object !== FALSE)
			{ 
				$htm = '
				<div id="org'.$object->id_organisme.'" style="border-top: solid 1px #ccc; margin: 10px 0px; padding: 10px 0px;">
					<table style="width: 100%;">
						<tr>
							<td style="width: 10%; vertical-align: top; text-align: center;">
								<img src="uploads/'.htmlentities($object->logo_organisme).'" 
									 alt="Logo de '.htmlentities($object->raison_sociale_organisme).'" 
									 style="width: 100px; height: 100px; object-fit: cover;">
							</td>
							<td style="width: 90%; vertical-align: top;">
								<strong>'.htmlentities($object->raison_sociale_organisme).' ('.self::display_label_state($object->etat_organisme).')</strong>
								<ul>
									<li>NRC : '.htmlentities($object->nrc_organisme).'</li>
									<li>FIXE : '.htmlentities($object->fixe_organisme).'</li>
									<li>FAX : '.htmlentities($object->fax_organisme).'</li>
									<li>EMAIL : '.htmlentities($object->email_organisme).'</li>
									<li>ADRRESSE : '.htmlentities($object->adresse_organisme).'</li>
								</ul>
								<p>'.htmlentities($object->specialite_organisme).'</p>
								<div style="text-align: right;">
									<button type="button"
											onclick="lister_offres('.$object->id_organisme.', 0);"
											class="btn btn-square btn-outline-info m-2"
											title="Lister les offres">
										<i class="bi bi-file-earmark-text"></i>
									</button>
									<button type="button"
											onclick="ajouter_offre('.$object->id_organisme.', 1);"
											class="btn btn-square btn-outline-info m-2"
											title="Ajouter une offre">
										<i class="fa fa-plus-circle"></i>
									</button>
									<button type="button"
											onclick="consulter_organisme('.$object->id_organisme.', 1);"
											class="btn btn-square btn-outline-info m-2"
											title="Consulter cet organisme">
										<i class="fa fa-search"></i>
									</button>
									<button type="button" 
											onclick="supprimer_organisme('.$object->id_organisme.');"
											class="btn btn-square btn-outline-danger m-2"
											title="Supprimer l\'organisme">
										<i class="fa fa-trash"></i>
									</button>
								</div>
							</td>
						</tr>
					</table>
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

	public static function display_list_for_recruteur($list, $title)
	{
		$htm = '
		<table style="width: 100%;">
			<tr>
				<td><h3>'.$title.'</h3></td>
				<td style="text-align: right;">
					<button type="button" 
					onclick="load_content(\'div#displays\', \'form_ajouter_organisme.php\');"
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
					$htm .= self::display_line_for_recruteur($object);
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
				case 1: $label = '<small style="color: #00dc00;">ACTIVE</small>'; break;
			}
		} 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

		return $label;
	}
}
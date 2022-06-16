<?php
class utilisateur_displays
{
    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new utilisateur();
            $object->id                   = isset($_POST['id__']) ? $_POST['id__'] :3;
            $object->prenon               = isset($_POST['pren']) ? $_POST['pren'] :"Lorem ipsum  set amet dolor";
            $object->nom                  = isset($_POST['nom_']) ? $_POST['nom_'] :"Lorem ipsum set amet dolor";
            $object->date_naissance       = isset($_POST['dnai']) ? $_POST['dnai'] :NULL;
            $object->mobile               = isset($_POST['mobi']) ? $_POST['mobi'] :"06463527";
            $object->email                = isset($_POST['emai']) ? $_POST['emai'] :"Lorem ipsum set amet dolor"; 
            $object->adresse              = isset($_POST['adrs']) ? $_POST['adrs'] :"Lorem ipsum set amet dolor";
            $object->code_postal          = isset($_POST['cpos']) ? $_POST['cpos'] :"01091997";
            $object->situation_familliale = isset($_POST['sitf']) ? $_POST['sitf'] :1;
            $object->numero_inscription   = isset($_POST['nins']) ? $_POST['nins'] :strings_lib::generate_number();
			$object->date_inscription     = isset($_POST['dins']) ? $_POST['dins'] :date("Y-m-d H:i:s");
			$object->login                = isset($_POST['logn']) ? $_POST['logn'] :"";
			$object->password             = isset($_POST['pswr']) ? $_POST['pswr'] :"";
			$object->type                 = isset($_POST['typ_']) ? $_POST['typ_'] :1; 
			$object->etat                 = isset($_POST['etat']) ? $_POST['etat'] :0;
		
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
				$htm = '<p>'.htmlentities($object->nom_utilisateur).'</p>';
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
				$htm =' 
				<div id="org'.$object->id_utilisateur.'" style="border-top: solid 1px #ccc; margin: 10px 0px; padding: 10px 0px;">
				    <table style="width: 100%;">
				        <tr>
						    <td style="width: 90%; vertical-align: top;">
						        <strong>'.htmlentities($object->nom_utilisateur).' ('.self::display_label_state($object->etat_utilisateur).')</strong>
						        <ul>
							        <li>PRENOM : '.htmlentities($object->prenon_utilisateur).'</li>
							        <li>DATE NAISSANCE : '.htmlentities($object->date_naissance_utilisateur).'</li>
							        <li>MOBILE : '.htmlentities($object->mobile_utilisateur).'</li>
							        <li>EMAIL : '.htmlentities($object->email_utilisateur).'</li>
							        <li>ADRRESSE : '.htmlentities($object->adresse_utilisateur).'</li>
									<li>NUMERO INSCRIPTION : '.htmlentities($object->numero_inscription_utilisateur).'</li>
						            <li>DATE INSCRIPTION : '.htmlentities($object->date_inscription_utilisateur).'</li>
									<li>PSEUDONYME : '.htmlentities($object->login_utilisateur).'</li>
								</ul>
								<div style="text-align: right;">
									<button type="button"
											onclick="modifier_etat_utilisateur('.$object->id_utilisateur.', 0);"
											class="btn btn-square btn-outline-info m-2">
										<i class="fa fa-stop"></i>
									</button>
									<button type="button"
											onclick="modifier_etat_utilisateur('.$object->id_utilisateur.', 1);"
											class="btn btn-square btn-outline-info m-2">
										<i class="fa fa-check-circle"></i>
									</button>
									<button type="button" 
											onclick="supprimer_utilisateur('.$object->id_utilisateur.');"
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
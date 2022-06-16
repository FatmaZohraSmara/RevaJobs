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
				$htm = '<p>'.htmlentities($object->numero_soumission_organisme).'</p>';
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $htm;
	}

	public static function display_list($list)
	{
		$htm = '';
		
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
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
			$object->login                = isset($_POST['logn']) ? $_POST['logn'] :"12345";
			$object->password             = isset($_POST['pswr']) ? $_POST['pswr'] :"123456789";
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
				$htm = '<p>'.htmlentities($object->nom_utilisateur).'</p>';
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
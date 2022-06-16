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
            $object->evaluation         = isset($_POST['eval']) ? $_POST['eval'] : 10;
            $object->date_reponse       = isset($_POST['drep']) ? $_POST['drep'] : NULL;
            $object->reponse            = isset($_POST['repn']) ? $_POST['repn'] : "TEST";
            $object->date_entretien     = isset($_POST['dent']) ? $_POST['dent'] : NULL;
            $object->numero_soumission  = isset($_POST['nsou']) ? $_POST['nsou'] : strings_lib::generate_number();
            $object->date_soumission    = isset($_POST['dsou']) ? $_POST['dsou'] : date("Y-m-d H:i:s");
            $object->etat               = isset($_POST['etat']) ? $_POST['etat'] : 1;
            $object->candidat           = isset($_POST['cand']) ? $_POST['cand'] : 1;
            $object->offre              = isset($_POST['offr']) ? $_POST['offr'] : 1;            
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
				$htm = '<p>'.htmlentities($object->numero_soumission_cantidature).'</p>';
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
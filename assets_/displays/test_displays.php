<?php
class test_displays
{
    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new test();
            $object->id                = isset($_POST['id__']) ? $_POST['id__'] : 2;
            $object->ennonce           = isset($_POST['enno']) ? $_POST['enno'] : "Lorem ipsum set amet dolor";
            $object->image             = isset($_POST['imge']) ? $_POST['imge'] : "default_picture.png";
            $object->reponse1          = isset($_POST['rep1']) ? $_POST['rep1'] : "Lorem ipsum set amet dolor";
            $object->reponse2          = isset($_POST['rep2']) ? $_POST['rep2'] : "Lorem ipsum set amet dolor";
            $object->reponse3          = isset($_POST['rep3']) ? $_POST['rep3'] : "Lorem ipsum set amet dolor";
            $object->reponse_valide    = isset($_POST['repv']) ? $_POST['repv'] : 3;
            $object->numero_soumission = isset($_POST['nsou']) ? $_POST['nsou'] : strings_lib::generate_number();
            $object->date_soumission   = isset($_POST['dsou']) ? $_POST['dsou'] : date("Y-m-d H:i:s");
            $object->offre             = isset($_POST['offr']) ? $_POST['offr'] : 0;
			       
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
				$htm = '<p>'.htmlentities($object->numero_soumission_test).'</p>';
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
				$htm = '<p>'.htmlentities($object->numero_soumission_test).'</p>';
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
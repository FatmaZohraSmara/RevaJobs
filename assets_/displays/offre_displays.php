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
				$htm = '<p>'.htmlentities($object->intitule_poste_offre).'</p>';
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
<?php
class competence_displays
{
    public static function generate_object()
	{
		$object = NULL;

		try
		{
            $object = new competence();
            $object->id          = isset($_POST['id__']) ? $_POST['id__'] : 1;
            $object->intitule    = isset($_POST['inti']) ? $_POST['inti'] : "TESTE";
            $object->description = isset($_POST['dscr']) ? $_POST['dscr'] : "TEXTE";
            $object->niveau      = isset($_POST['nive']) ? $_POST['nive'] : 0;
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
				$htm = '<p>'.htmlentities($object->intitule_competence).'</p>';
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
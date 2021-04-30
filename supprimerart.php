<?PHP
require_once "../../core/artc.php";
include_once "../../entities/art.php";
include_once "Ajouterart.php";




if  (isset($s))
{
	$artc= new artc();
	$artc->Supprimerart($s);
   
}

?>
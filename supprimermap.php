<?PHP
require_once "../../core/mapc.php";
include_once "../../entities/map.php";
include_once "ajoutermap.php";




if  (isset($s))
{
	$mapc= new mapc();
	$mapc->Supprimermap($s);
   
}

?>
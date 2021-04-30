<?PHP
require_once "../../core/localc.php";
include_once "../../entities/local.php";
include_once "ajouterlocal.php";




if  (isset($s))
{
	$localc= new localc();
	$localc->Supprimerlocal($s);
   
}

?>
<?PHP
require_once "../../core/articlec.php";
include_once "../../entities/article.php";
include_once "Ajouterarticle.php";




if  (isset($s))
{
	$articlec= new articlec();
	$articlec->Supprimerarticle($s);
   
}

?>

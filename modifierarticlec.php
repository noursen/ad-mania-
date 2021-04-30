<?php 

include '../../entities/article.php';
include '../../core/articlec.php';



if( isset($_POST['id']) and isset($_POST['categorie']) and isset($_POST['nom']) and isset($_POST['disponibilite']) )
{

$article = new article($_POST['id'],$_POST['categorie'],$_POST['nom'],$_POST['disponibilite']);
	

	$articlec=new articlec();
	$articlec->modifierarticle($article,$_POST['id']);
	header('Location: ajouterarticle.php');
}
else{
	echo "verifier les champs";
}

 ?>
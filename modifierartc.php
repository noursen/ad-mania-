<?php 

include '../../entities/art.php';
include '../../core/artc.php';



if( isset($_POST['id']) and isset($_POST['categorie']) and isset($_POST['nom'])  )
{

$art = new art($_POST['id'],$_POST['categorie'],$_POST['nom']);
	

	$artc=new artc();
	$artc->modifierart($art,$_POST['id']);
	header('Location: ajouterart.php');
}
else{
	echo "verifier les champs";
}

 ?>
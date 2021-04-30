<?php 

include '../../entities/map.php';
include '../../core/mapc.php';



if( isset($_POST['id']) and isset($_POST['type']) and isset($_POST['nom']) and isset($_POST['categorie']) )
{

$map = new map($_POST['id'],$_POST['type'],$_POST['nom'],$_POST['categorie']);
	

	$mapc=new mapc();
	$mapc->modifiermap($map,$_POST['id']);
	header('Location: ajoutermap.php');
}
else{
	echo "verifier les champs";
}

 ?>   
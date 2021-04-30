<?php 

include '../../entities/local.php';
include '../../core/localc.php';



if( isset($_POST['id']) and isset($_POST['Gouvernant']) and isset($_POST['nom_rue']) and isset($_POST['codepostal']) )
{

$local = new local($_POST['id'],$_POST['Gouvernant'],$_POST['nom_rue'],$_POST['codepostal']);
	

	$localc=new localc();
	$localc->modifierlocal($local,$_POST['id']);
	header('Location: ajouterlocal.php');
}
else{
	echo "verifier les champs";
}

 ?>   
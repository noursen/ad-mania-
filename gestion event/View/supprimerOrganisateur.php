<?php
 include_once '../Controller/OrganisateurC.php';
 $org = new OrganisateurC();
 if(isset($_GET['id'])){
     $org->supprimerOrganisateur($_GET['id']);
 
    header('Location:ajouter2.php');
    }

 ?>


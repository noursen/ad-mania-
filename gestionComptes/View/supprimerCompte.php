<?php
 include_once '../Controller/CompteC.php';
 $co = new CompteC();
 if(isset($_GET['id'])){
     $co->supprimerCompte($_GET['id']);
 
    header('Location:ajouter1.php');
    }

 ?>


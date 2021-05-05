<?php
 include_once '../Controller/EvenementC.php';
 $ev = new EventC();
 if(isset($_GET['reference'])){
     $ev->supprimerEvent($_GET['reference']);
 
    header('Location:ajouter1.php');
    }

 ?>


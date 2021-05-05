<?php
 include_once '../Controller/roleC.php';
 $ro = new roleC();
 if(isset($_GET['reference'])){
     $ro->supprimerRole($_GET['reference']);
 
    header('Location:ajouter2.php');
    }

 ?>


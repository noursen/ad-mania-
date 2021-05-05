<?php
include_once '../Controller/compteC.php';
$compteC = new CompteC();

if (
    isset($_POST["id"]) && 
     isset($_POST["mdp"]))
     {
        if (
            !empty($_POST["id"]) && 
             !empty($_POST["mdp"]) )
             {$mdp=$compteC->verifierLogin($_POST['id']);
                 foreach($mdp as $m)
                 {if($m['mdp']==$_POST['mdp'])
                    $compteC->setconnected($_POST['id'],'1');
                    header('Location:../../gestion event/View/acceuil.html') ;}
             }
     }
?>
<form action="" method="post">
<input type="text" name="id" id="">
<input type="text" name="mdp">
<input type="submit" value="ok">
</form>
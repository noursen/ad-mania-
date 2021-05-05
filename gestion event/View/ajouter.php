<?php
include_once '../Model/Event.php';
include_once '../Controller/EvenementC.php';
$error = "";

    // create event
    $evenement = null;

    // create an instance of the controller

    $evenementC = new EventC();
    if (
        isset($_POST["nom"]) && 
         isset($_POST["theme"]) && 
        isset($_POST["organisateur"]) && 
        isset($_POST["description"])&&
        isset($_POST["date"])&&
        isset($_POST["datefin"])
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["theme"]) && 
            !empty($_POST["organisateur"]) &&
            !empty($_POST["description"]) && 
            !empty($_POST["date"])&&
            !empty($_POST["datefin"])
        ) {
            $evenement = new Event(
                $_POST['nom'],
                $_POST['theme'],
                $_POST['organisateur'], 
                $_POST['date'],
                $_POST['description'],
                $_POST['datefin']
            );
            $evenementC->ajouterEvent($evenement);
            
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Courgette|Open+Sans&display=swap" rel="stylesheet"> 
    <body>
    <link rel="stylesheet" href="temp.css">
    
        <button><a href="afficherUtilisateurs.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <div class="login-wrap">
        <form action="" method="POST" class="login-html">
            <table border="0" align="center">

                <tr>
                    
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="50" class="tab"></td>
                </tr>
                <tr>
                    <td>
                        <label for="reference">Description:
                        </label>
                    </td>
                    <td><textarea id="description" name="description" rows="5" cols="33">
</textarea></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="organisateur" >Organisateur:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="organisateur" id="organisateur" class="tab">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <label for="theme" >Théme:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="theme" id="theme" class="tab">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date" >Date début:
                        </label>
                    </td>
                    <td>
                        <input type="date"  name="date" id="date" class="tab">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="datefin" >Date fin:
                        </label>
                    </td>
                    <td>
                        <input type="date"  name="datefin" id="datefin" class="tab">
                    </td>
                </tr>
              
               
            </table>
            <input type="submit" value="Envoyer" class="button"> 
                    
                    <input type="reset" value="Annuler" class="button">
        </form>
                        </div>
    </body>
</html>



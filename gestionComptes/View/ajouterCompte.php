<?php
include_once '../Model/compte.php';
include_once '../Controller/compteC.php';
include_once '../Controller/roleC.php';
$compteC = new CompteC();
$listeC = $compteC->afficherCompte();
$roleC = new roleC();
$listeR= $roleC->afficherRole();
$error = "";

    // create event
    $evenement = null;
    
           

    

    // create an instance of the controller

    $compteC = new CompteC();
    if (
        isset($_POST["nom"]) && 
         isset($_POST["numtel"]) && 
        isset($_POST["email"]) && 
        isset($_POST["mdp"])&&
        isset($_POST["role"])
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["numtel"]) && 
            !empty($_POST["email"]) &&
            !empty($_POST["mdp"]) && 
            !empty($_POST["role"])
        ) {
            $compte = new Compte(
                $_POST['nom'],
                $_POST['numtel'],
                $_POST['email'], 
                $_POST['mdp'],
                $_POST['role']
            );
            $compteC->ajouterCompte($compte);
            mail($_POST['email'],'objet','verif','From:harrabiharrabi543@gmail.com');
            
            header('Location:ajouterCompte.php');
        }
        else
            $error = "Missing information";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="js/saisie.js"></script>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    
   
                    <form method="POST" onsubmit="verif();">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nom" id="nom" name="nom">
                        </div>
                        
                        
                        <div class="input-group">
                            <input class="input--style-3" type="number" placeholder="Numtel" name="numtel">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="MDP" name="mdp">
                        </div>
                        <div class="input-group">
                        <select class="input--style-3"name="role"  id="role">
                        <option>Role...</option>
                <?php 
                foreach($listeR as $role){?>
                <option value=<?php echo $role['nom']?>><?php echo $role['nom']?></option>
               <?php } ?></select>

                        </div>
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="submit" onclick="verif();">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
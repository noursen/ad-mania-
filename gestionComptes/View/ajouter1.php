<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
include_once '../Model/compte.php';
include_once '../Controller/compteC.php';
include_once '../Controller/roleC.php';
$compteC = new CompteC();
$listeC = $compteC->afficherCompte();
$conn = $compteC->verifierLogin(26);
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
            
            header('Location:ajouter1.php');
        }
        else
            $error = "Missing information";
    }
    if (isset($_POST["rech"])&&isset($_POST["search"])) {
      if(!empty($_POST["rech"]))
      $listeC = $compteC->afficherCompteRech( $_POST['rech']);
  }
  if (isset($_POST["tri"])) {
    if(!empty($_POST["tri"]))
    $listeC = $compteC->afficherCompteTrie( $_POST['tri']);
}


?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<script src="js/saisie.js"></script>
<body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
      <div id="top-navigation"> Welcome <a href="#"><strong>Administrator</strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="#">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
      <ul>
        <li><a href="#" class="active"><span>Dashboard</span></a></li>
        <li><a href="#"><span>New Articles</span></a></li>
        <li><a href="#"><span>User Management</span></a></li>
        <li><a href="#"><span>Photo Gallery</span></a></li>
        <li><a href="#"><span>Products</span></a></li>
        <li><a href="#"><span>Services Control</span></a></li>
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
    
    <!-- End Message OK -->
    <!-- Message Error -->
    
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
       
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
             <form method="POST" action="ajouter1.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="det"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>ID</th>
                <th>Nom</th>
            
                <th>Numtel</th>
                <th>email</th>
                <th>role</th>
                <?php if (isset($_POST["det"]))
  
  {  $listeC = $compteC->afficherJoin();
   echo "<th>Salaire</th>";
   echo "<th>Niveau</th>";} ?>   
               
              </tr>

              <?php
    foreach($listeC as $compte){
        ?>



              <tr>
                <td><?php echo $compte['id']; ?></td>
                <td><?php echo $compte['nom']; ?></td>
                 
                <td><?php echo $compte['numtel']; ?></td>
                <td><?php echo $compte['email']; ?></td>
                <td><?php echo $compte['role']; ?></td>
                <?php if (isset($_POST["det"])){ echo "<td>";?><?php echo $compte['salaire']; ?><?php echo "</td>" ;}?>
                <?php if (isset($_POST["det"])){ echo "<td>";?><?php echo $compte['niveau']; ?><?php echo "</td>" ;}?>
                <td><a href="supprimerCompte.php?id=<?php echo $compte['id']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierCompte.php?id=<?php echo $compte['id'];?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              
              
              
              
              
              
              
            
            <?php } ?>
            </table>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
      
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              <p> 
                <label>numtel </label>
                <input type="number" class="field size1" name="numtel" id="numtel"/>
              </p>


              <p> 
                <label>Email </label>
                <input type="email" class="field size1" name="email" id="email" />
              </p>
              <p> 
                <label>MDP </label>
                <input type="password" class="field size1" name="mdp" id="mdp" />
              </p>
              <p> 
                <label>Role </label>
                <select name="role" id="role">
                <?php 
                foreach($listeR as $role){?>
                <option value=<?php echo $role['nom']?>><?php echo $role['nom']?></option>
               <?php } ?></select>
              </p>

            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();"/>
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <form method="POST"><label>Sort by</label>
              <select name="tri" class="field" >
              
                <option value="nom">nom</option>
                <option value="email">email</option>
                <option value="role">role</option>
                
              </select><input type="submit"  value="trier"></form>
              
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
  </div>
</div>
<!-- End Container -->
<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->





</body>
</html>

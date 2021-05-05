<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
include_once '../Model/Organisateur.php';
include_once '../Controller/OrganisateurC.php';

$organisateurC = new OrganisateurC();
$listeE = $organisateurC->afficherOrganisateur();

$error = "";

    // create event
    $organisateur = null;

    // create an instance of the controller

    $organisateurC = new OrganisateurC();
    if (
        isset($_POST["nom"]) && 
        
        isset($_POST["email"]) && 
        isset($_POST["type"])&&
        isset($_POST["tel"])
       
    ) {
        if (
            !empty($_POST["nom"]) && 
           
            !empty($_POST["email"]) &&
            !empty($_POST["type"]) && 
            !empty($_POST["tel"])
            
        ) {
            $organisateur = new Organisateur(
                $_POST['nom'],
               
                $_POST['email'], 
                $_POST['type'],
                $_POST['tel']
                
            );
            $organisateurC->ajouterOrganisateur($organisateur);
            
            header('Location:ajouter2.php');
        }
        else
            $error = "Missing information";
    }
    if (isset($_POST["recherche"])) {
      if(!empty($_POST["recherche"]))
      $listeE = $organisateurC->afficherOrganisateurRech( $_POST['recherche']);
  }
    
?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<body>
<link rel="stylesheet" href="style2021.css" type="text/css" media="all" />
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
        <li><a href="#"><span>New Organziers</span></a></li>
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
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Organizers </div>
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
            <h2 class="left">Current Organizers</h2>
            <div class="right">
             <form method="POST"> <label>search organizers</label>
              <input type="text" class="field small-field"  name="recherche"/>
              <input type="submit" class="button" value="search"/></form>
             
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
              <th>Id</th>
                <th>Nom</th>
                
                
                <th>Tel</th>
                <th>Email</th>
                <th>Type</th>
                
               
              </tr>

              <?php
    foreach($listeE as $organisateur){
        ?>



              <tr>
              <td><?php echo $organisateur['id']; ?></td>
                <td><?php echo $organisateur['nom']; ?></td>
               
               
                <td><?php echo $organisateur['tel']; ?></td>
                <td><?php echo $organisateur['email']; ?></td>
                <td><?php echo $organisateur['type']; ?></td>
                <td><a href="supprimerOrganisateur.php?id=<?php echo $organisateur['id']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierOrganisateur.php?id=<?php echo $organisateur['id'];?>" class="ico edit">Edit</a>
                <td> <a href="stat.php?nom=<?php echo $organisateur['nom'];?>" class="ico edit">Stat</a>
               
              
              
              
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
            <h2>Add New Organizer</h2>
          </div>
          <script src="../ajout2.js"></script>
          <!-- End Box Head -->
          <form action="#" method="post">

            <!-- Form -->
            
            <div class="form"  method="post">
              <p> 
                <label for="nom">Nom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              


              <p> 
                <label for="tel">Tel </label>
                <input type="number" class="field size1" name="tel" id="tel" />
              </p>

              <p class="inline-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="mail@serveur.com">
              </p>

              
                <label for="type">Type</label>
                <select name="type" >
                
                <option value="Club">Club</option>
                <option value="Fondation">Fondation</option>
                <option value="Individu">Individu</option>
                
                
                
                </select>
                
              
              
            </div>
            
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();" />
             
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
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Organiers</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <label>Sort by</label>
              <select class="field">
                <option value="">Title</option>
              </select>
              <select class="field">
                <option value="">Date</option>
              </select>
              <select class="field">
                <option value="">Author</option>
              </select>
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

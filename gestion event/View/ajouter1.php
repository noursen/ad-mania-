
<?php
include_once '../Model/Event.php';
include_once '../Controller/EvenementC.php';
include_once '../Controller/OrganisateurC.php';
include_once '../../gestionComptes/Controller/compteC.php';

$compteC = new CompteC();
$listeC = $compteC->afficherCompte();
$evenementC = new EventC();
$organisateurC= new OrganisateurC();
$listeE = $evenementC->afficherjoint();
$listeS = $evenementC->statistiques();        
$listO =$organisateurC->afficherOrganisateur();

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
            foreach($listeC as $compte){
              mail($compte['email'],'Event',$_POST['organisateur'].' organise l`evenement '.$_POST['nom'].' le '.$_POST['date'],'From: noursen.amami@esprit.tn');
              }
            header('Location:ajouter1.php');
        }
        else
            $error = "Missing information";
    }
    if(isset($_POST['tri'])){
    
      $listeE=$evenementC->trierEvent($_POST['tri']);
     }
    if (isset($_POST["recherche"])) {
      if(!empty($_POST["recherche"]))
      $listeE = $evenementC->afficherEventRech( $_POST['recherche']);
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
        <li><a href="#"><span>New Events</span></a></li>
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
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Events </div>
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
            <h2 class="left">Current Events</h2>
            <div class="right">
             <form method="POST"> <label>search Events</label>
              <input type="text" class="field small-field"  name="recherche"/>
              <input type="submit" class="button" value="search"/></form>
             
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
              <th>réference</th>
                <th>Nom</th>
                <th>théme</th>
                
                <th>date début</th>
                <th>date fin</th>
                <th>description</th>
                <th>organisateur</th>
               
              </tr>

              <?php
    foreach($listeE as $event){
        ?>



              <tr>
              <td><?php echo $event['reference']; ?></td>
                <td><?php echo $event['nom']; ?></td>
                <td><?php echo $event['theme']; ?></td>
                
                <td><?php echo $event['da']; ?></td>
                <td><?php echo $event['datefin']; ?></td>
                <td>   <textarea name="" id="" cols="15" rows="5" class="table"><?php echo $event['Description']; ?></textarea></td>
                <td><?php echo $event['organisateur']; ?></td>
                <td><a href="supprimerEvent.php?reference=<?php echo $event['reference']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierEvent.php?reference=<?php echo $event['reference'];?>" class="ico edit">Edit</a>
                
               
              
              
              
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
          <script src="../ajout.js"></script>
          <!-- End Box Head -->
          <form action="#" method="post">

            <!-- Form -->
            
            <div class="form">
              <p> 
                <label for="nom">Nom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              <p> 
                <label for="theme">théme </label>
                <input type="text" class="field size1" name="theme" id="theme" />
              </p>


              <p> 
                <label for="organisateur">Organisateur </label>
                <select name="organisateur" id="">
                <?php  foreach($listO as $org){ ?>
                <option value="<?php echo $org['nom'];?>"> <?php echo $org['nom'];?>    </option> <?php }?>
                </select>
              </p>

              <p class="inline-field">
                <label for="date">Date début</label>
                <input type="date" name="date" id="date">
              </p>

              <p class="inline-field">
                <label for="datefin">Date fin</label>
                <input type="date" name="datefin" id="datefin">
              </p>
              <p> 
                <label for="description">Description</label>
                <textarea class="field size1" rows="10" cols="30" name="description" id ="description"></textarea>
              </p>
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
         
            
            <!-- Sort -->
            <div class="sort">
            <form method="POST"><label>Sort by</label>
              <select class="field" name="tri">
                <option value="nom" >nom</a></option>
                <option value="da">date</a></option>
                <option value="theme">theme</a></option>
              </select>
              <br>
              <input type="submit" class="button" value="Trier"/></form>
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
       <!-- Box Head -->
       <div class="box">
       <div class="box-head">
            <h2>Statistiques</h2>
          </div>
          <script src="../ajout.js"></script>
          <!-- End Box Head -->
      <div id="piechart"> </div>
    </div></div>
    <!-- Main -->
    
  </div>
  </div>
 

  
  
  <?php 
include_once "../Controller/EvenementC.php";
$evenementC = new EventC();

$listeE = $evenementC->statistiques();
 ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    
  var data = google.visualization.arrayToDataTable([
   
  [ 'kkk', 'Hours per Day'],
  <?php
  foreach($listeE as $k){
   echo "["; echo "'";echo $k['organisateur'];echo"'";echo",";echo $k['count(*)'];echo"],";}?>



  

  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':750, 'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>


<!-- End Container -->

<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2021 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->





</body>
</html>

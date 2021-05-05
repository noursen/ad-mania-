<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/compteC.php';
 
 $co = new compteC();
 if(isset($_GET['id'])){
   $compteC = new compteC();
   $listeC = $compteC->afficherCompteDetail($_GET['id']);
 
 foreach($listeC as $compte){
 ?>
 <body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="#" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value=<?php echo $compte['nom'];?> />
              </p>
              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" value=<?php echo $compte['numtel'];?> />
              </p>


              <p> 
                <label>Email </label>
                <input type="email" class="field size1" name="email" value=<?php echo $compte['email'];?> />
              </p>

              <p>
                <label>MDP</label>
                <input type="password" name="mdp" value=<?php echo $compte['mdp'];?>>
              </p>

              <p>
                <label>role</label>
                <input type="text" name="role" value=<?php echo $compte['role'];}?>>
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 <?php
 // create event
 $compte = null;

 // create an instance of the controller

 $compteC = new compteC();
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
         $compte = new compte(
             $_POST['nom'],
             $_POST['numtel'],
             $_POST['email'], 
             $_POST['mdp'],
             $_POST['role']
         );
        $compteC->modifierCompte($_GET['id'],$compte);
         
         header('Location:ajouter1.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>
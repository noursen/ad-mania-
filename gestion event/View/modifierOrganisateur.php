<?php
 include_once '../Controller/OrganisateurC.php';
 $org = new OrganisateurC();
 if(isset($_GET['id'])){
   $organisateurC = new OrganisateurC();
   $listeE = $organisateurC->afficherOrganisateurDetail($_GET['id']);
 
 foreach($listeE as $organisateur){
 ?>
 <body>

 <link rel="stylesheet" href="style2021.css" type="text/css" media="all" />
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
            <h2>Modify Organizer</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" name="nom" class="field size1"value=<?php echo $organisateur['nom'];?>>
              </p>
             
              <p> 
                <label>Tel </label>
                <input type="number" name="tel" class="field size1" value=<?php echo $organisateur['tel'];?>>
              </p>
              <p class="inline-field">
                <label>Email</label>
                <input type="email" name="email" class="field size1" value=<?php echo $organisateur['email'];}?>> 
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
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
          </div>
 </div>
 <?php
 // create event
 $organisateur = null;

 // create an instance of the controller

 $organisateurC = new OrganisateurC();
 if (
     isset($_POST["nom"]) && 
      
     isset($_POST["tel"]) && 
     isset($_POST["email"])&&
     isset($_POST["type"])
     
 ) {
     if (
         !empty($_POST["nom"]) && 
         
         !empty($_POST["tel"]) &&
         !empty($_POST["email"]) && 
         !empty($_POST["type"])
         
     ) {
         $organisateur = new Organisateur(
             $_POST['nom'],
            
             $_POST['email'], 
             $_POST['type'],
             $_POST['tel']
            
         );
        $organisateurC->modifierOrganisateur($_GET['id'],$organisateur);
         
        header('Location:ajouter2.php');
     }
     else
         $error = "Missing information";
 }


 } ?>
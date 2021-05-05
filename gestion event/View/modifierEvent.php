<?php
 include_once '../Controller/EvenementC.php';
 $ev = new EventC();
 if(isset($_GET['reference'])){
   $evenementC = new EventC();
   $listeE = $evenementC->afficherEventDetail($_GET['reference']);
 
 foreach($listeE as $event){
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
            <h2>Modify Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" name="nom" class="field size1"value=<?php echo $event['nom'];?>>
              </p>
              <p> 
                <label>Théme </label>
                <input type="text" name="theme" class="field size1" value=<?php echo $event['theme'];?>>
              </p>
              <p> 
                <label>Organisateur </label>
                <input type="text" name="organisateur" class="field size1" value=<?php echo $event['organisateur'];?>>
              </p>
              <p class="inline-field">
                <label>Date début</label>
                <input type="date" name="date" name="datefin" value=<?php echo $event['da'];?>>
              </p>
              <p class="inline-field">
                <label>Date fin</label>
                <input type="date" name="datefin" name="datefin" value=<?php echo $event['datefin'];?>>
              </p>
              <p> 
                <label>Description</label>
                <textarea class="field size1" rows="10" cols="30" name="description"><?php echo $event['Description'];}?></textarea>
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
        $evenementC->modifierEvent($_GET['reference'],$evenement);
         
        header('Location:ajouter1.php');
     }
     else
         $error = "Missing information";
 }


}?>
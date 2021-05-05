<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/roleC.php';
 
 $ro = new roleC();
 if(isset($_GET['reference'])){
   $roleC = new roleC();
   $listeR = $roleC->afficherRoleDetail($_GET['reference']);
 
 foreach($listeR as $role){
 ?>
 <body>



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
            <h2>Update Role</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value=<?php echo $role['nom'];?> />
              </p>
              <p> 
                <label>Niveau </label>
                <input type="number" class="field size1" name="niveau" value=<?php echo $role['niveau'];?> />
              </p>


              <p> 
                <label>Salaire </label>
                <input type="number" class="field size1" name="salaire" value=<?php echo $role['salaire'];?> />
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
 // create 
 $role = null;

 // create an instance of the controller

 $roleC = new roleC();
 if (
     isset($_POST["nom"]) && 
      isset($_POST["niveau"]) && 
     isset($_POST["salaire"]) 
 ) {
     if (
         !empty($_POST["nom"]) && 
         !empty($_POST["niveau"]) && 
         !empty($_POST["salaire"]) 
     ) {
         $role = new role(
             $_POST['nom'],
             $_POST['niveau'],
             $_POST['salaire']
         );
        $roleC->modifierRole($_GET['reference'],$role);
         
         header('Location:ajouter2.php');
     }
     else
         $error = "Missing information";
 }

}
}

?>
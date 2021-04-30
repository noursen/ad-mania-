<?php
include_once '../../entities/article.php';
include_once '../../core/articlec.php';
$error = "";

    // create event
    $article1 = null;

    // create an instance of the controller

    $articlec1 = new articlec();
    if (
        isset($_POST["id"]) && 
         isset($_POST["categorie"]) && 
        isset($_POST["nom"]) && 
        isset($_POST["disponibilite"]) &&
        isset($_POST["image"])
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST["categorie"]) && 
            !empty($_POST["nom"]) &&
            !empty($_POST["disponibilite"]) &&
            !empty($_POST["image"]) 
        ) {
            $article1 = new article(
              $_POST["id"],
              $_POST["categorie"],
              $_POST["nom"], 
              $_POST["disponibilite"],
              $_POST["image"]
            );
            $articlec1->ajouterarticle($article1);
            
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
    }
    $listearticle=$articlec1->afficherarticle();
     

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>antico</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
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
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Articles</h2>
            <div class="right">
              <label>search articles</label>
              <input type="text" class="field small-field" />
              <input type="submit" class="button" value="search" />
            </div>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
                <th>id</th>
                <th>categorie</th>
                <th>nom</th>
                <th>disponibilite </th>
                <th>image</th>
              </tr>
              <?PHP
				foreach($listearticle as $article){
			?>
				<tr>
					<td><?PHP echo $article['id'];  ?></td>
					<td><?PHP echo $article['categorie']; ?></td>
					<td><?PHP echo $article['nom']; ?></td>
          <td><?PHP echo $article['disponibilite']; ?></td>
          <td><img style="
             width: 50px;
            " src="../img/<?php echo $article['Image'] ?>"></td>
					<td>
           
						<form method="GET"  action="supprimerarticle.php" > 
						<a href="supprimerarticle.php" class="ico del">Delete</a>
            <input type="hidden" value=<?PHP echo $article['id']; ?> name="id">
            <?php $s=$article['id']; ?>
						</form>
					</td>
					<td>
          <a href="modifierarticle.php" class="ico edit">Edit</a>
					</td>
				</tr>
        <?PHP
				}
			?>
       
              
            </table>
            <!-- Pagging -->
            <div class="pagging">
              <div class="left">Showing 1-12 of 44</div>
              <div class="right"> <a href="#">Previous</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">245</a> <span>...</span> <a href="#">Next</a> <a href="#">View all</a> </div>
            </div>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
        </div>
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New aricle </h2>
          </div>
          <!-- End Box Head -->
          <form action="" method="POST" class="login-html">
            <table border="0" align="center">

                <tr>
                    
                    <td>
                        <label for="id">id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" maxlength="50" class="tab"></td>
                </tr>
                <tr>
                    <td>
                        <label for="categorie">categorie:
                        </label>
                    </td>
                    <td><input type="text" name="categorie" id="categorie" maxlength="50" class="tab"></td>
</textarea></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="nom" >nom:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom" class="tab">
                    </td>
                </tr>
                <tr>
                    
                <td>
                        <label for="disponibilite" >disponible 
                        </label>
                    </td>
                    <td>
                        <input type="radio" name="disponibilite" id="disponibilite" class="tab">
                    </td>
                    <div class="form-group">
                                
                                <input class="form-control"  id="image" name="image" type="file" placeholder="image"   />
                                                           </div>
                                                         
                                                             </div> 
                </tr>
               
               
            </table>
            <input type="submit" value="Envoyer" class="button"> 
                    
                   
        </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->

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


<?php
include_once '../../entities/local.php';
include_once '../../core/localc.php';
$error = "";

    
    $local1 = null;

    

    $localc1 = new localc();
    if (
        isset($_POST["id"]) && 
          isset($_POST["pays"]) && 
        isset($_POST["nom_rue"]) && 
        isset($_POST["codepostal"])
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST["pays"]) && 
            !empty($_POST["nom_rue"]) &&
            !empty($_POST["codepostal"]) 
        ) {
            $local1 = new local(
              $_POST["id"],
              $_POST["pays"],
              $_POST["nom_rue"], 
              $_POST["codepostal"]
            );
            $localc1->ajouterlocal($local1);
            
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
    }
    $listelocal=$localc1->afficherlocal();
     

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
        <li><a href="#" class="active"><span>ACCEUIL</span></a></li>
        <li><a href="#"><span>New local</span></a></li>
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
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current local </div>
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
            <h2 class="left">Current local</h2>
            <div class="right">
              <label>search local</label>
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
                <th>Gouvernant</th>
                <th>nom_rue</th>
                <th>codepostal</th>
              </tr>
              <?PHP
				foreach($listelocal as $local){
			?>
				<tr>
					<td><?PHP echo $local['id'];  ?></td>
					<td><?PHP echo $local['pays']; ?></td>
					<td><?PHP echo $local['nom_rue']; ?></td>
          <td><?PHP echo $local['codepostal']; ?></td>
					<td>
           
						<form method="GET"  action="supprimerlocal.php" > 
						<a href="supprimerlocal.php" class="ico del">supprimer</a>
            <input type="hidden" value=<?PHP echo $local['id']; ?> name="id">
            <?php $s=$local['id']; ?>
						</form>
					</td>
					<td>
          <a href="modifierlocal.php" class="ico edit">MODIFIER</a>
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
                        <label for="pays">pays:
                        </label>
                    </td>
                    <td><input type="text" name="pays" id="pays" maxlength="50" class="tab"></td>
</textarea></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="nom_rue" >nom_rue:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom_rue" id="nom_rue" class="tab">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <label for="codepostal" >codepostal:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="codepostal" id="codepostal" class="tab">
                    </td>
                </tr>
               
               
            </table>
            <input type="submit" value="Ajouter" class="button"> 
                    
                   
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
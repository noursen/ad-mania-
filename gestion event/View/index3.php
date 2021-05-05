<?php
require_once '../Controller/OrganisateurC.php';


$organisateurC = new OrganisateurC();

$listeO = $organisateurC->afficherOrganisateur();
$i=1;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleindex3.css">
</head>
<body>
    <div class="container">
    <?php 
    foreach($listeO as $org){?>   
    <div class="card">
    <div class="content">
  <h2><?php echo $i ?></h2>
  <h3><?php echo $org['nom'];?></h3>
  <p>email : <?php echo $org['email'];?></p>
  <p>tél : <?php echo $org['tel'];?></p>
  <p>type : <?php echo $org['type'];?></p>
   
    <a href="index4.php?nom=<?php echo $org['nom'];?>" >Voir les evenements</a>

</div>
     </div>
     <?php $i=$i+1; } ?>
     </div>
     
     </div>

    </div>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
        glare:true,
       "max-glare":1,
	});
    </script>
</body>

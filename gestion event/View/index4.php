<?php

require_once '../Controller/EvenementC.php';

ob_start();
    include('index3.php');
    ob_end_clean();
$evenementC = new EventC();

$listeE = $evenementC->afficherEventDetailNom($_GET['nom']);

     
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="style232.css" />
    <section>
        <div class="leftBox">
            <div class="content">
                <h1>Events And Shows</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae temporibus commodi saepe eum eligendi reiciendis impedit, ipsum unde magni, dicta error odio quibusdam labore quas aperiam reprehenderit vitae ut repudiandae!</p>

            </div>
        </div>
<div class="events">
<ul>
    <?php
    foreach($listeE as $event){
        ?>

    
<li>
<div class="time">
    <h2>
     <?php echo substr($event['da'],8,2) ?><br><span><?php if (substr($event['da'],5,2)=='01') echo 'January';
     if (substr($event['da'],5,2)=='02') echo 'Febuary';
     if (substr($event['da'],5,2)=='03') echo 'March';
     if (substr($event['da'],5,2)=='04') echo 'April';
     if (substr($event['da'],5,2)=='05') echo 'May';
     if (substr($event['da'],5,2)=='06') echo 'June';
     if (substr($event['da'],5,2)=='07') echo 'July';
     if (substr($event['da'],5,2)=='08') echo 'August';
     if (substr($event['da'],5,2)=='09') echo 'September';
     if (substr($event['da'],5,2)=='10') echo 'October';
     if (substr($event['da'],5,2)=='11') echo 'November';
     if (substr($event['da'],5,2)=='12') echo 'December';
      ?></span>
    </h2>
</div>
<div class="details">
    <h3><?php echo $event['nom']; ?></h3>
    <p><textarea name="" id="" class="area" cols="54" rows="4" style="overflow:hidden" ><?php echo $event['Description']; ?></textarea></p>
    <?php $rech=$event['reference'];?>

<a href="indexDetails.php?reference=<?php echo $event['reference'];?>" >View Details</a>

</div>
<div style="clear:both ;"></div>


</li>
<?php } ?>

</ul>

</div>
</section>
    
    
</body>
</html>
<?php 

require_once('C:/xampp/htdocs/project/gestion event/Controller/EvenementC.php');
    require_once('C:/xampp/htdocs/project/vendor/autoload.php');
    require_once('C:/xampp/htdocs/project/gestionComptes/Controller/compteC.php');
    $prix=(float)$_GET['prix'];
    $ref=$_GET['ref'];
    $eventC=new EventC();
    $compteC=new compteC();
    $log=$compteC->selectLog();

    
    
    \Stripe\Stripe::setApiKey('sk_test_51InhWiJmcpbasMK9NTPUT1P9Wj6yB057M1LUcEai4R7ljN07rLQpeoDwSRvll6EKXUV6AmBuQGBlbzXu6XjkcZOx00V17iIGTd');
    $intent =\Stripe\PaymentIntent::create([
    'amount' => $prix*100,
    'currency' => 'eur'

    ]);
  
            $eventC->incrE($ref);
    
    
    
    
    
    
  

?>
<!DOCTYPE html>
<script src="scripts.js"></script>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">

<div id="errors"></div>
<input type="text" name="incr" id="incr" value='1'>
<input type="text" name="" value=<?php echo $ref; ?>>
<input type="text" id="cardholder-name"placeholder="Titulaire de la carte" value=<?php foreach($log as $l) echo $l['nom']; ?>>
<div id="card-elements"></div>
<div id="card-errors" role="alert"></div>
<button id="card-button" type="submit" data-secret="<?php echo  $intent['client_secret'] ?>">Proceder au paiement</button>

</form>
<script src="https://js.stripe.com/v3/"></script>

</body>
</html>
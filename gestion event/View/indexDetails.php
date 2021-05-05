<?php  include_once "../Controller/EvenementC.php";
  ob_start();
    include('index2.php');
    ob_end_clean();
    $evenementC = new EventC();
$listeE = $evenementC->afficherEventDetail($_GET['reference']);

foreach($listeE as $event)
    {$ref=$event['reference'];

    ?>

  
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>  Event</title>
    <link href="css4/bootstrap.min.css" rel="stylesheet">
    <link href="css4/font-awesome.min.css" rel="stylesheet">
	<link href="css4/style455.css" rel="stylesheet">
	<link href="css4/animate.css" rel="stylesheet">	
	<link href="css4/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images1/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images1/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images1/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images1/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images1/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header" role="banner">		
		<div class="main-nav">
			<div class="container">
				<div class="header-top">
					<div class="pull-right social-icons">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-youtube"></i></a>
					</div>
				</div>     
		        <div class="row">	        		
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="index.html" >
							<div><img src="images1/11.png" alt=""></div>
		                	<div><h4><?php echo $event['nom'];?> organised by <?php echo $event['organisateur'];?></h4>
							</div></a>                  
		            </div>
		            <div class="collapse navbar-collapse">
		              
		            </div>
		        </div>
	        </div>
        </div>                    
    </header>
    <!--/#header--> 

    <section id="home">	
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>
				<li data-target="#main-slider" data-slide-to="1"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img class="img-responsive" src="images1/slider/bg1.jpg" alt="slider">						
					<div class="carousel-caption">
						<h2>register for our next event </h2>
						<h4>full event package only <?php echo $event['prix']; ?> DT</h4>
						<a href="paiement.php?prix=<?php echo $event['prix']; ?>&amp;ref=<?php echo $event['reference']; ?>">GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images1/slider/bg2.jpg" alt="slider">	
					<div class="carousel-caption">
						<h2>register for our next event </h2>
						<h4>full event package only <?php echo $event['prix']; ?> DT</h4>
						<a href="#contact">GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images1/slider/bg3.jpg" alt="slider">	
					<div class="carousel-caption">
						<h2>register for our next event </h2>
						<h4>full event package only @$199</h4>
						<a href="#contact" >GRAB YOUR TICKETS <i class="fa fa-angle-right"></i></a>
					</div>
				</div>				
			</div>
		</div>    	
    </section>
	<!--/#home-->

	<section id="explore">
		<div class="container">
			<div class="row">
				<div class="watch">
					<img class="img-responsive" src="images1/watch.png" alt="">
				</div>				
				<div class="col-md-4 col-md-offset-2 col-sm-5">
					<h2>our next event in</h2>
				</div>				
				<div class="col-sm-7 col-md-6">					
					<ul id="countdown">
						<li>	
								<?php $diff=abs((strtotime($event['da'])-time())) ?>		
							<span class="days time-font"><?php 
							
							
							echo ceil($diff/(3600*24*360))-1
							
							?></span>
							<p>day </p>
						</li>
						<li>
							<span class="hours time-font"><?php echo ceil($diff%(3600*24*360)/(30*24*3600))-1 ;?></span>
							<p class="">month </p>
						</li>
						<li>
							<span class="minutes time-font"><?php echo ceil($diff%(3600*24*360)%(30*24*3600)/(3600*24))-1?></span>
							<p class="">year</p>
						</li>
										
					</ul>
				</div>
			</div>
			<div class="cart">
				<a href="#"><i class="fa fa-shopping-cart"></i> <span>Purchase Tickets</span></a>
			</div>
		</div>
	</section><!--/#explore-->

	

	<section id="about">
		<div class="guitar2">				
			<img class="img-responsive" src="images1/guitar2.jpg" alt="guitar">
		</div>
		<div class="about-content">					
					<h2>About <?php echo $event['nom'];?></h2>
					<p><?php echo $event['Description'];}?></p>
					
				
		</div>
	</section><!--/#about-->
	
<!--/#twitter-feed-->
	
    

	
    <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p> Copyright  &copy;2014<a target="_blank" href="http://shapebootstrap.net/"> Evento </a>Theme. All Rights Reserved. <br> Designed by <a target="_blank" href="http://shapebootstrap.net/">ShapeBootstrap</a></p>                
            </div>
        </div>
    </footer>
    <!--/#footer-->
  
    <script type="text/javascript" src="js1/jquery.js"></script>
    <script type="text/javascript" src="js1/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="js1/gmaps.js"></script>
	<script type="text/javascript" src="js1/smoothscroll.js"></script>
    <script type="text/javascript" src="js1/jquery.parallax.js"></script>
    <script type="text/javascript" src="js1/coundown-timer.js"></script>
    <script type="text/javascript" src="js1/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js1/jquery.nav.js"></script>
    <script type="text/javascript" src="js1/main.js"></script>  
</body> 

        

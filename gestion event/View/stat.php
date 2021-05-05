<?php 
include_once "../Controller/EvenementC.php";
$evenementC = new EventC();

$listeE = $evenementC->compterev();
$listeA = $evenementC->statistiqueswh($_GET['nom']);
 ?>
<!DOCTYPE html>
<html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    
  var data = google.visualization.arrayToDataTable([
   
  [ 'kkk', 'Hours per Day'],
  <?php foreach($listeA as $a){
   echo "["; echo"'";echo $a['organisateur'] ;echo"'";echo",";echo $a['count(*)'];echo"],";
   $aux=$a['count(*)'];}?>
  <?php
  foreach($listeE as $k){
   echo "["; echo "'Reste'" ;echo",";echo $k['count(*)']-$aux;echo"],";}?>
  



  

  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<body>

<h1>Stat</h1>

<div id="piechart">


</body>
<html>
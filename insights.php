<!DOCTYPE HTML>
<html>
<head>  
    <?php 
    include 'scripts/chart.php';
    //contians the neccessary javascript to initialize the chart
    //see the page for more detailed information
    include 'includes/header.php'; //contains neccessary css and js for
    //the page, along with a index.php
  ?>


<div id="chartContainer" style="height: 100%; width: 100%;"></div>
  <!-- The above container will have the chart inside of it
the library below has the library that the chart uses-->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
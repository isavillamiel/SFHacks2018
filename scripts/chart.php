<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Emotion Measurements"
	},
	toolTip: {
		shared: true
	},
	data: [

    <?php
      session_start();
      $number = $_SESSION['phone']; //get the phone number of the user
      include 'emotionData.php';  //this script
      //will print the emotion data in a javascript format
    //see the page for more comments
    
    
    //all other code is for initializing the chart
    //with specified settings
    ?>
    
  ]
}); //initializes the chart with the user's
  //data on emotion
  
chart.render(); //fills the div with the chart

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
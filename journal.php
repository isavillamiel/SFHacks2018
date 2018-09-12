<!DOCTYPE html>
<html>


<head>
  <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script>

  <?php 
    include 'includes/header.php';

    session_start();
		$number = $_SESSION['phone'];
    if(!isset($number)){
        include '../databases/cbtConnect.php'; //link database
        $phone = $_GET["phone"];
        $code = $_GET["code"]; //get the codes from url
        include 'scripts/checkCode.php'; //checks database
      //redirects to index as appropriate
      //TODO: display message to user if they have incorrect code
      echo "<script>location.reload();</script>";
    }
	?>
  <div class='row'>

    <div class='col-md-4'>
      <a href="insights.php" class="button2">Insights</a>
    </div>
    <div class='col-md-4'>
      <a href="#" onclick='analyze()' class="button3">Analyze</a>
    </div>
    <div class='col-md-4'>
      <a href="entries.php" class="button2">Entries</a>
    </div>
  </div><!-- Action area, gives the option to analyze journal,
  view the graphs, and list entries-->
  <div class='row'>

    <div class='col-md-12'>
      <center>
        <textarea style="font-size:35px; width: 100%" id='entry' rows='5'>
    </textarea>
      </center>
    </div>
  </div>


  <script>
    function analyze() {
      var content = tinyMCE.get('entry').getContent();
      //get the journal entry of the user
      //pass the content to the writer page

      jqStuff(content);
    }

    function jqStuff(text) {
      $.ajax({
        type: 'post',
        url: "scripts/writer.php",
        data: {
          'text': text,
          'number': <?php echo $number; ?>
        },
        cache: false,
        success: function(data) {
          alert("Journal entry successful\n");
          //indicate to the user that their entry was successful
          tinyMCE.get('entry').setContent("");
          //clear out journal text
        }
      });

    }
  </script>
  </body>

</html>
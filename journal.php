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
  ?>

  <?php 
    session_start();
		$number = $_SESSION['phone'];
    if(!isset($number)){
        include '../databases/cbtConnect.php';
        $phone = $_GET["phone"];
        $code = $_GET["code"];
        include 'scripts/checkCode.php';
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
  </div>
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
      journal = document.getElementById('entry');
      var content = tinyMCE.get('entry').getContent()

      //alert(content);
      jqStuff(content, journal);
    }

    function jqStuff(text, jr) {
      $.ajax({
        type: 'post',
        url: "scripts/writer.php",
        data: {
          'text': text,
          'number': <?php echo $number; ?>
        },
        cache: false,
        success: function(data) {
          alert("Journal entry successful\n"+data);
          tinyMCE.get('entry').setContent("");
        }
      });

    }
  </script>
  </body>

</html>
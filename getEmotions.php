<?php 
        $text = $_GET['text'];
        file_put_contents("tmp.txt", "");
        file_put_contents("tmp.txt", $text);

        $command = "python emotions.py";
        $output = shell_exec($command);
        echo $output;
?>




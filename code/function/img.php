
 <?php
 $filename = 'C:/xampp/htdocs/fms/'.$_GET["image"];

echo 'The following image... <br><img src="data:image/png;base64,'.base64_encode(file_get_contents($filename)).'" />';




	?>
  <br>
  <br>
  <br>
  <br>




  <button onclick="history.go(-1);">Back </button>

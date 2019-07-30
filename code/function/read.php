<?php
$filename ='C:/xampp/htdocs/fms/'.$_GET["read"];

$fh = fopen($filename,'r');
while ($line = fgets($fh)) {
  echo($line);
}
fclose($fh);

?>
<br>
<br>
<br>
<br>

<button onclick="history.go(-1);">Back </button>

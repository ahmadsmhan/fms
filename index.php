<?php
ob_start();// use to do refresh whit html
session_start();

//check  user has logged in or not.
if (!$_SESSION['user']) {
    header("location: code/function/register.php");
  }

$user=$_SESSION["user"];
 ?>

  <meta charset="utf-8">
  <link rel="icon" href="code/icon/folder.png">
  <link rel="stylesheet" href="function/master.css">

  <title>File manager</title>
 <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Create Form ~~~~ -->

  <form action="" method="post">
  <input id="Dele"type="text" name="term" required/>
  <input class="btn info" type="submit" name="create" value="Create Folder " />
  </form>

  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Upload Form ~~~~ -->

  <form style="margin-top: -30px;margin-left:900px; "method="POST" action="" enctype="multipart/form-data">
  <input style="background-color:#357bd1" type="file" name="Upfile">
  <input class="btn info" type="submit"  name="subUpload" value="Upload">
  </form>


<?php
// ---------------- Information path  to **/fileuser/User file.
    $current_path = "fileuser/$user";
    if(isset($_GET['path'])) {
      $current_path = $_GET['path'];
    }

      function show_files($current_path) {
      $contents = scandir($current_path);
      array_splice($contents, 0,2);
      echo "<ul>"."<br>"."<br>"."<br>";


      foreach ( $contents as $item ) {

?>

<table style="width:80%;  border-bottom: double; margin-left: 50px;background-color: #00a1ff52;   border-radius: 15px;">

              <style>
              table, th, td {
              text-align: left;
            }

              </style>
<!-- ~ ~~~~~~~~~~~~~~~~~~~~~~~~~~~table for user Permissions ~~~~~~~~~~~~. -->



      <tr >
      <th style="width:80%; height:50%; ">
        <?php
//------------------------------------echo name of item ---------
        echo"<p  style= 'text-decoration: none ;   font-size: 22px;color:#bad5fff7;
        color:#fff;font-family: system-ui;'>$item</p>";
         ?>
<!-- ~~~~~~~~~~~~~~~~~~~ for user Permission delete ~~~~~~~~~~~~. -->
<!--~~~~~~~~~~~~~~~~~~~~~~~ delete form.~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->




      <th><a  href="code/function/delete.php?name=<?php echo $current_path.'/'.$item; ?>"><img  style="max-height: 35px;
      max-width: 50px;
      color: blue;
      " src="code/icon/del.png"></a>
      </th>

      <!-- ~ ~~~~~~~~~~~ for user Permission .rar ~~~~~~~~~~~~. -->

    <th><a style=" padding:15px" href="code/function/rar.php?namee=<?php echo $current_path.'/'.$item; ?>"><img  style="max-height: 35px;
    max-width: 50px;
    color: blue;
    " src="code/icon/zip.png"></a>
    </th>
    <!-- ~ ~~~~~~~~~~~ for user Permission open directory only ~~~~~~~~~~~~. -->

    <th>
      <?php
    $dier= $current_path.'/'.$item; //path of image && text.

    if(is_dir($current_path.'/'.$item))
    {$opDir = "?path=$current_path/$item";// path of director
    echo '<a href="'.$opDir.'"><img  style="wiDth:40%" src="code/icon/open-folder.png"></a>';

  }
//------------------------------------for user Permission open image---------

    elseif (exif_imagetype($current_path.'/'.$item)) {

      echo '<a href="code/function/img.php?image='.$dier.'"><img  style="width:40%" src="code/icon/instagram.png"></a>';

    }

    else {
      echo '<a href="code/function/read.php?read='.$dier.'"><img  style="width:40%" src="code/icon/open.png"></a>';



      }

    ?>

  </th></tr>
    </table>


  <?php


}if (!scandir($current_path)) {
header("location: 404.html");
}
                      echo "</ul>";
                      }

                    show_files($current_path);


      //--------------code fpr Upload in any path/------------/
 if(isset($_POST['subUpload'])){
   $file_name=$_FILES["Upfile"]['name'];
   	$file_tem=$_FILES["Upfile"]['tmp_name'];
   		$file_story= $current_path.'/'.$file_name;
   					if (move_uploaded_file($file_tem , $file_story));
   				header("Refresh:0");
   					ob_end_flush();
}



if(isset($_POST['create'])){
    mkdir("$current_path/$_POST[term]");
     header("Refresh:0");
}



include("code/function/functions.php");
 check_Url();

GO_BACK();


?>



<a href="code/function/logout.php">logout</a>



   </body>
 </html>

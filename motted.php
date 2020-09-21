 <!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
<?php
  $username = "Indrek Karg";
  require("/home/indrkar/public_html/VP/veebiprogrammeerimine/config.php");
  $database = "if20_indrek_ka_1";
  //loen lehele kõik olemasolevad mõtted
  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
  $stmt = $conn->prepare("SELECT idea FROM myideas");
  echo $conn->error;
  //seome tulemuse muutujaga
  $stmt->bind_result($ideafromdb);
  $stmt->execute();
  $ideahtml = "";
  while($stmt->fetch()){
	  $ideahtml .= "<p>" .$ideafromdb ."</p>";
  }
  $stmt->close();
  $conn->close();
 ?>
   <title><?php echo $username; ?> programmeerib veebi</title>

   <?php echo $ideahtml; ?>
  <a href=home.php> Koju tagasi </a>
  
</head>
<body>
</html>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">

<?php
//var_dump($_POST);
  $username="Indrek Karg";
  require("/home/indrkar/public_html/VP/veebiprogrammeerimine/config.php");
  $database = "if20_indrek_ka_1";
  //kui on idee sisestatud ja nuppu vajutatud, salvestame selle andmebaasi
  if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
	  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
	  //valmistan ette SQL käsu
	  $stmt = $conn->prepare("INSERT INTO myideas (idea) VALUES(?)");
	  echo $conn->error;
	  //seome käsuga päris andmed
	  //i - integer, d - decimal, s - string
	  $stmt->bind_param("s", $_POST["ideainput"]);
	  $stmt->execute();
	  echo $stmt->error;
	  $stmt->close();
	  $conn->close();
  }
?>
 <title><?php echo $username; ?> programmeerib veebi</title>
  <form method="POST">
    <label>Sisesta oma pähe tulnud mõte!</label>
	 <input type="text" name="ideainput" placeholder="Kirjuta siia mõte!">
	 <input type="submit" name="ideasubmit" value="Saada mõte ära!">
  <a href=home.php> Koju tagasi </a>
</head>
<body>
</html>
<?php
  $username = "Indrek Karg";
  $fulltimenow = date("d.m.Y H:i:s");
  $hournow = date("H");
  $partofday = "aeg";
  if($hournow < 6){
	  $partofday = "uneaeg";
  }//enne 6
  if($hournow >= 8 and $hournow <= 15){
	  $partofday = "õppimise aeg";
  }
  if($hournow >= 16 and $hournow <= 20){
	  $partofday = "töö aeg";
  }
  if($hournow >=21 and $hournow <= 22){
	  $partofday = "söömine";
  }
  if($hournow >=22 and $hournow <= 23){
	  $partofday = "hügieen";
  }
	  
  //semestri möödumine
  $today = new DateTime("now");
  $semesterstart = new DateTime("2020-8-31");
  $semesterend = new DateTime("2020-12-13");
  $semesterduration = $semesterstart->diff($semesterend);
  $semesterdurationdays = $semesterduration->format("%r%a");
  $semesterlength = $today->diff($semesterstart);
  $semesterlengthdays = $semesterlength ->format("%r%a");
  $semesterpercent = semesterlengthdays * 100 / $semesterdurationdays;
  $semesterdone = "blaaaa";
  if ($semesterpercent < 0) {
	  $semesterdone = "Semester pole veel alanud";
  }
  if ($semesterpercent >= 100) {
	  $semesterdone = "Semester on läbi!";
  }
  if ($semesterpercent > 0 and $semesterpercent < 100) {
	  $semesterdone = "Semester on täies hoos.";
  }
  
  
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?> programmeerib veebi</title>

</head>
<body>
  <h1><?php echo $username; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See konkreetne leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>Lehe avamise hetk: <?php echo $fulltimenow; ?>.</p>
  <p><?php echo "Praegu on " .$partofday ."."; ?></p>
</body>
</html>




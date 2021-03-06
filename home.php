<?php
 
  $username = "Indrek Karg";
  $fulltimenow = date("d.m.Y H:i:s");
  $daynow = date("d");
  $hournow = date("H");
  $yearnow = date("Y");
  $timenow = date("H:i:s");
  $partofday = "aeg";
  $weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  //echo $weekdaynameset;
  //var_dump($weekdaynameset);
  $weekdaynow = date("N");
  $monthnow = date("n");
  //echo $weekdaynow;
  
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
  $semesterlength = $semesterstart->diff($today);
  $semesterlengthdays = $semesterlength ->format("%r%a");
  $semesterpercent = $semesterlengthdays * 100 / $semesterdurationdays;
  $fromsemesterlength = $semesterlength ->format("%r%a");
  $semesterpercentage = 0;
  
  
  $semesterinfo = "Semester kulgeb vastavalt akadeemilisele kalendrile";
  if($semesterstart > $today){
	  $semesterinfo = "Semester pole veel peale hakanud!";
  }
  if($fromsemesterlength === 0){
	  $semesterinfo = "Semester algab täna!";
  }
  if($fromsemesterlength > 0 and $fromsemesterlength < $semesterdurationdays){
	  $semesterpercentage = ($fromsemesterlength / $semesterdurationdays) * 100;
	  $semesterinfo = "Semester on täies hoos, kestab juba " .$fromsemesterlength ." päeva, läbitud on " .$semesterpercentage ."%.";
  }
  if($fromsemesterlength == $semesterdurationdays){
	  $semesterinfo = "Semester lõppeb täna!";
  }
  if($fromsemesterlength > $semesterdurationdays){
	  $semesterinfo = "Semester on läbi saanud!";
  }
  
  //annan ette lubatud pildivormingute loendi
  $picfiletypes = ["image/jpeg", "image/png"];
  //loeme piltide kataloogi sisu ja näitame pilte
  //$allfiles = scandir("../vp_pics/");
  $folder = "/home/indrkar/public_html/VP/veebiprogrammeerimine/vp_pics/";
  $allfiles = array_slice(scandir($folder), 2);
  //var_dump($allfiles);
  //$picfiles = array_slice($allfiles, 2);
  $picfiles = [];
  //var_dump($picfiles);
  foreach($allfiles as $thing){
	$fileinfo = getImagesize($folder . $thing);
    //var_dump($fileinfo);
	if(in_array($fileinfo["mime"], $picfiletypes) == true){
		array_push($picfiles, $thing);
	}
  }
  
  
  //paneme kõik pildid ekraanile
  $piccount = count($picfiles);
  $picnum = mt_rand(0, ($piccount - 1));
  //$i = $i + 1;
  //$i ++;
  //$i += 2;
  $imghtml = "";
  //<img src="../vp_pics/failinimi.png" alt="tekst">
  //for($i = 0; $i < $piccount; $i ++){
  $imghtml .= '<img src="vp_pics/' .$picfiles[$picnum] .'" ';
  $imghtml .= 'alt="Tallinna Ülikool 123">';

require("header.php");  
?>
  <img src="img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1><?php echo $username; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>Lehe avamise hetk: <?php echo $weekdaynameset[$weekdaynow-1].", ". $daynow. ". ". $monthnameset[$monthnow-1]. " ". $yearnow. ", kell on ". $timenow; ?>.</p>
  <p><?php echo "Praegu on " .$partofday ."."; ?></p>
  <hr>
  <a href="mote.php"> Sisesta oma mõtteid siia. </a>
  <a href="motted.php"> Loe mõtteid siit. </a>

  </form>
  <hr>
  <?php echo $imghtml; ?>
</body>
</html>




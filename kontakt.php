﻿<?php

	session_start();
	
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: kontakt.php');
		exit();
	}
?>

<!DOCTYPE HTML5>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Platforma do egzaminów</title>
	<meta name="description" content="Strona służąca do dodawania egzaminów dla studentów UTP"/>
	<meta name="keywords" content="utp, egzamin, e-learning"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800i" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<script type="text/javascript" src="script/timer.js"></script>
	
</head>

<body onload="timer();">
	<div class="wrapper">
		<div id="logo">
			Platforma e-learningowa
		</div>
		<div id="timer"></div>
		<div style="clear:both;"></div>
		<div id="menu" class="menu">
			<ol>
				<li><a href="index.php"><div id="option">Strona główna</div></a></li>
				<li><a href="egzaminator.php"><div id="option">Dla egzaminatora</div></a>
					<ul>
						<li><a href="egzaminE.php"><div id="option">Egzaminy</div></a></li>
						<li><a href="ocenyE.php"><div id="option">Ocenianie</div></a></li>
					</ul>
				</li>
				<li><a href="student.php"><div id="option">Dla studenta</div></a>
					<ul>
						<li><a href="egzaminS.php"><div id="option">Egzaminy</div></a></li>
						<li><a href="ocenyS.php"><div id="option">Oceny</div></a></li>
					</ul>
				</li>
				<li><a href="kontakt.php"><div id="option">Kontakt</div></a></li>
			</ol>
		</div>
		
		<div id="container">

		<div id="topbar">
			<div id="topbarL">
				<img src="img/logo.png"/>
			</div>
			<div id="topbarR">
				<span class="bigtitle">Twórcy projektu:</span> <br /> <br />
			<b>Bartosz Ropejko, Marcin Musiał, Mateusz Matysiak, Adam 		Kabatek, Jakub Krzewiński </b> - studenci pierwszego roku Informatyki Stosowanej na Uniwersytecie Technologiczno-Przyrodniczym w Bydgoszczy.
			</div>
			<div style="clear:both;"></div>
		</div>
		
			<div id="sidebar">
				<form action="zaloguj.php" method="POST">
						Login: <br /> <input type="text" name="login" /> <br />
						Hasło: <br /> <input type="password" name="pass" /> <br/><br />
					<input type="submit" value="Zaloguj się" />
				</form>
				<a href="index.php" class="tilelink"><div class="optionL">Strona głowna</div></a>
				<a href="egzaminator.php" class="tilelink"><div class="optionL">Dla egzaminatora</div></a>
				<a href="student.php" class="tilelink"><div class="optionL">Dla studenta</div></a>
				<a href="kontakt.php" class="tilelink"><div class="optionL">Kontakt</div></a>
				<div style="clear:both;"></div>
			</div>
		
			<div id="content">
				<span class="bigtitle">Kontakt</span> <br /><br />
				Jan Kowalski<br />
				e-mail: jankowalski@gmail.com<br />
				telefon: 111-222-333<br />
				Sala: 100 budynek 2.1
			</div>
			
			<div id="footer">
				Platforma e-learningowa w sieci od 2018r &copy
			</div>
			
		</div>
	</div>
		
		<script src="script/jquery-1.11.3.min.js" ></script>
		<script src="script/home.js"></script>

</body>
</html>
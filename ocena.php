﻿<?php

	session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
<?php
	echo "<p>Witaj ".$_SESSION['login'].'! [<a href="logout.php">Wyloguj się!</a>]</p>';
	echo "<p><b>Email:</b> ".$_SESSION['email'];
?>
				<a href="egzaminator.php" class="tilelink"><div class="optionL">Dla egzaminatora</div></a>
				<a href="student.php" class="tilelink"><div class="optionL">Dla studenta</div></a>
				<a href="kontakt.php" class="tilelink"><div class="optionL">Kontakt</div></a>
				<div style="clear:both;"></div>
			</div>
		
			<div id="content">
			<table id="test" width="700" border="1">
					<tr>
					<td>Numer pytania</td>
					<td>Pytanie</td>
					<td>Punkty</td>
					</tr>
					<tr>
					<td>1</td>
					<td>Co to są testy jednostkowe i po co się je stosuje.</td>
					<td><input type="text" value="3"/></td>
					</tr>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole">Test jednostkowy służy do sprawdzenia pojedynczej jednostki kodu.Jego zadaniem jest weryfikacja (bez ingerencji programisty), czy testowany kod działa poprawnie.
						</textarea>
					</td>
					</tr>
					<tr>
					<td>10</td>
					<td>Wymienić min. 10 popularnych projektów open source.</td>
					<td><input type="text" value="1"/></td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole">Blender, DSpace, Gimp, Firefox, PHP, Perl, Python, Plone, MySQL, Moodle</textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>17</td>
					<td>Kiedy warto stosować docker-compose, a kiedy nie?</td>
					<td><input type="text" value="2"/></td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole">Docker-compose warto stosować wtedy, kiedy chcemy utworzyć obraz aplikacji wielokontenerowej, natomiast nie warto go stosować przy tworzeniu prostych aplikacji jednokontenerowych.</textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>6</td>
					<td>Do czego służą następujące polecenia: git push i git pull.</td>
					<td><input type="text" value="2"/></td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole">Git push – Wysłanie zmodyfikowanego repozytorium na jedną z gałęzi głównego repozytorium.
					Git pull – Pobiera ostatnie zmiany w repozytorium i od razu je stosuje (łączny = merguje)
						</textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>8</td>
					<td>Co jest sprawdzane przy pomocy testów jednostkowych?</td>
					<td><input type="text" value="4"/></td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole">Sprawdzane jest czy testowany kod działa poprawnie.</textarea>
					</td>
					</tr>
					</tr>
				</table>
				<button id="zakoncz" type="button" class="buttons">Zakończ</button>
			</div>
			

			<div id="footer">
				Platforma e-learningowa w sieci od 2018r &copy
			</div>
			
		</div>
	</div>
		<script src="script/home.js"></script>
		<script src="script/exit.js"></script>

</body>
</html>
<?php
	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
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
		<style>
			#timer{
				font-size: 25px;
				margin-left: 640px;
			}
			#logo{
				margin-left: 210px;
			}
		</style>
		<div id="logo">
			Platforma e-learningowa
		</div>
		
		<div id="timer"></div>
		
		<div style="clear:both;"></div>
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
			<div id="content" >
				<style>
					#content {
						margin-left: 100px;
						margin-right: 100px;
						border-top-right-radius: 10px;
						border-bottom-left-radius: 10px;
						border-top-left-radius: 10px;
						border-bottom-right-radius: 10px;
						font-family: arial;
						font-size: 25px;
						min-height: 215px;
					}
				</style>
				Dziękujemy za rejestrację w naszej platformie e-learningowej! Możesz już zalogować się na swoje konto! <br /> <br />
				<style >
					a{
						text-decoration: none;
						padding: 10px;
						margin-left: 174px; 
					}
				</style>
				<a href="index.php">Zaloguj się na swoje konto! </a>
				<br /><br />
			</div>

		</div>
	</div>

</body>
</html>
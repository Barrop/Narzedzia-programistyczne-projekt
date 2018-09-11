<?php

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
			<style >
				table{
					font-style: italic;
				}
			</style>
			<div id="content">
	<form action="student.php" method="post">	
	</form>
<?php
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno; 
	}
	else {
		if (!mysqli_set_charset($polaczenie, "utf8")) {
    		printf("Error loading character set utf8: %s\n", mysqli_error($polaczenie));
			} 		
		else {
    		printf("", mysqli_character_set_name($polaczenie));
			}
		$wynik = mysqli_query($polaczenie,"SELECT * FROM egzamin");
		while($row = mysqli_fetch_array($wynik)){
			echo $row['pytanie'] ; echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['A']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['B']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['C']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['D']." ";  echo "<br><br>";
		}
		$polaczenie->close();
	}

	/*if(isset($_POST['end'])){
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
		if($polaczenie->connect_errno!=0){
			echo "Error: ".$polaczenie->connect_errno; 
		}
		else {
			if (isset($_POST['odpowiedz1'])){
			$odp1 = $_POST['odpowiedz1'];
			$ins = "INSERT INTO odp_uzytkownicy (uzytkownik, Numer_pytania, odp) values ('dziala', 1, '$odp1')";
			$result = mysqli_query($polaczenie,$ins);
			$polaczenie->close();
			}
		}
	}*/
?>

			<style>
				button{
					display: block;
					height: 32px; 
					border: none;
					margin-left: 285px;
					background-color: #404040;
					color: #fff;
					font-family: arial;
				}
				button:hover{
					cursor: pointer;
					background-color: #303030;
				}
			</style>
			
			<a href="ocena.php"><button type="submit">Zakończ</button>
			</div>


			<div id="footer">
				Platforma e-learningowa w sieci od 2018r &copy
			</div>
			
		</div>
	</div>
		<script src="script/home.js"></script>
		<script src="script/los.js"></script>


</body>
</html>
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
			<table id="test" class="test" width="700" border="1">
					<tr>
					<td>Numer pytania</td>
					<td>Pytanie</td>
					<td>Punkty</td>
					</tr>
					<tr>
					<td>1</td>
					<td>Co to są testy jednostkowe i po co się je stosuje.</td>
					<td>3</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole"></textarea>
					</td>
					</tr>
					<tr>
					<td>10</td>
					<td>Wymienić min. 10 popularnych projektów open source.</td>
					<td>4</td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole"></textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>17</td>
					<td>Kiedy warto stosować docker-compose, a kiedy nie?</td>
					<td>2</td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole"></textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>6</td>
					<td>Do czego służą następujące polecenia: git push i git pull.</td>
					<td>3</td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole"></textarea>
					</td>
					</tr>
					</tr>
					<tr>
					<td>8</td>
					<td>Co jest sprawdzane przy pomocy testów jednostkowych?</td>
					<td>3</td>
					<tr>
						<td></td>
						<td>
						<textarea id ="pole"></textarea>
					</td>
					</tr>
					</tr>
				</table>
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
		$wynik = mysqli_query($polaczenie,"SELECT * FROM egzamin");
		while($row = mysqli_fetch_array($wynik)){
			echo $row['pytanie'] ; echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['A']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['B']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['C']." ";  echo "<br>";
			echo "<input name='odpowiedz{$row['id']}' type='radio' />".$row['D']." ";  echo "<br>";
		}
		$polaczenie->close();
	}

  // Show the radio button value, i.e. which one was checked when the form was sent
 

	if(isset($_POST['end'])){
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
	}
?>



<?php
	/*if ($polaczenie->query($ins) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ins . "<br>" . $polaczenie->error;
}*/



	/*$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno; 
	}
	else {
		if(isset($_POST["odpowiedz{${'id'}"])){
			$odpowiedz . ${'id'} = $_POST["odpowiedz{$row['id']}"];
		}
		else{
			$odpowiedz . ${'id'} = NULL;
		}
	if ($odpowiedz . ${'id'} != NULL)
		{
		 $ins = @mysql_query("INSERT INTO odp_uzytkownicy SET uzytkownik='login', Numer_pytania='${"id"}', odp=$odpowiedz . ${'id'}"); 
		 if($ins) echo "Rekord został dodany poprawnie"; 
    	else echo "Błąd nie udało się dodać nowego rekordu";
		mysqli_close($polaczenie);
		}
		else{
			echo "Wybierz odpowiedzi";
		}
	}
*/
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
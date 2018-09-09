<?php
	session_start();
	
	if(isset($_POST['email']))
	{
		//Udana walidacja (poprawność)
		$wszystko_OK=true;
		
		//Sprawdzanie poprawności nicka
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nicka
		if((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Login musi posiadać od 3 do 20 znaków!";
		}
		
		if(ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		//Sprawdzanie poprawności e-mail
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdzanie poprawności hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}
		
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Sprawdzanie czy dana osoba jest botem (zaakceptowanie reCAPTCHY)
		$sekret = "6LfWwG4UAAAAALAufpixip6fegNkI5YMLkRuuIf9";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno()); // Rzuć nowym wyjątkiem
			}
			else
			{
				// Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}
				
				// Czy Nick już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE login='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już konto o takim nicku, wybierz inny!";
				}
				
				if($wszystko_OK==true)
				{
					//Wszystko działa, dzieki czemu dodaliśmy gracza do bazy
					if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick','$haslo_hash','$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				
				$polaczenie->close();			
			}
		}
		catch(Exception $e) 
		{
			echo '<span style="color:red">Błąd serwera, prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
			
		}
	}
?>

<!DOCTYPE HTML5>
<html lang="pl">
<head>

	<meta charset="utf-8"/>
	<title>Platforma do egzaminów</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<meta name="description" content="Strona służąca do dodawania egzaminów dla studentów UTP"/>
	<meta name="keywords" content="utp, egzamin, e-learning"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800i" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<script type="text/javascript" src="script/timer.js"></script>
	
	<style>  
	.error
	{
		color:red;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: 154px;
	}
	</style>
	
</head>

<body onload="timer();">
	<div class="wrapper">
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
				<form name="signup-form" method="post" >
					<div id="content" >
						<style>
							#content {
								margin-left: 100px;
								margin-right: 100px;
								border-top-right-radius: 10px;
								border-bottom-right-radius: 10px;
								border-top-left-radius: 10px;
								border-bottom-right-radius: 10px;
							}
						</style>
						<style>
							input{
								margin-left: 154px;
								height: 40px;
								width: 400px;
							}
						</style>
						<br/> <input type="text" name="nick" placeholder="Login" /> <br />
						
						<?php
						
							if(isset($_SESSION['e_nick']))  // Wyświetla bląd o nicku
							{
								echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
								unset($_SESSION['e_nick']);
							}
						?>
						
						<br/> <input type="text" name="email" placeholder="E-mail" /> <br />
						
						<?php
						
							if(isset($_SESSION['e_email']))		// Wyświetla bląd o mailu
							{
								echo '<div class="error">'.$_SESSION['e_email'].'</div>';
								unset($_SESSION['e_email']);
							}
						?>
						
						<br/> <input type="password" name="haslo1" placeholder="Hasło" /> <br />
						
						<?php
						
							if(isset($_SESSION['e_haslo']))		// Wyświetla bląd o haśle
							{
								echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
								unset($_SESSION['e_haslo']);
							}
						?>
						
						<br/> <input type="password" name="haslo2" placeholder="Powtórz hasło" /> <br />
						<style>
							.g-recaptcha{
								margin-left: 202px;
								margin-top: 20px;
								width: 300px;
							}
						</style>
						<div class="g-recaptcha" data-sitekey="6LfWwG4UAAAAAHuCnXE1yEIJ2F7wdnd47hb-wUsH"></div>
							
						<?php
						
							if(isset($_SESSION['e_bot']))			// Wyświetla bląd o braku captchy
							{
								echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
								unset($_SESSION['e_bot']);
							}
						?>

						<style>
							button{
								display: block;
								height: 32px; 
								border: none;
								margin-left: 300px;
								margin-top: 20px;
								background-color: #404040;
								color: #fff;
								font-family: arial;

							}
							button:hover{
								cursor: pointer;
								background-color: #303030;
							}
						</style>

						<button type="submit">Zarejestruj się</button>
						<br/>
						<style>
							a{
								margin-left: 320px;
								text-decoration: none;
							}
						</style>
						<a href="index.php">Powrót</a>
					</div>
				</form>
			</div>
	</div>
		<script src="scriptjquery-1.11.3.min.js" ></script>
		<script src="script/home.js"></script>
</body>
</html>
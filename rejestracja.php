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
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if(ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
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
		
		// Zaakceptowanie regulaminu
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}	
		
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
	}
	</style>
	
</head>

<body>

	<form method="post">
	
	Login: <br/> <input type="text" name="nick" /> <br />
	
	<?php
	
		if(isset($_SESSION['e_nick']))  // Wyświetla bląd o nicku
		{
			echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
			unset($_SESSION['e_nick']);
		}
	?>
	
	E-mail: <br/> <input type="text" name="email" /> <br />
	
	<?php
	
		if(isset($_SESSION['e_email']))		// Wyświetla bląd o mailu
		{
			echo '<div class="error">'.$_SESSION['e_email'].'</div>';
			unset($_SESSION['e_email']);
		}
	?>
	
	Twoje hasło: <br/> <input type="password" name="haslo1" /> <br />
	
	<?php
	
		if(isset($_SESSION['e_haslo']))		// Wyświetla bląd o haśle
		{
			echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
			unset($_SESSION['e_haslo']);
		}
	?>
	
	Powtórz hasło: <br/> <input type="password" name="haslo2" /> <br />
	
	<label>
		<input type="checkbox" name="regulamin"/> Akceptuję regulamin
	</label>
	
	<?php
	
		if(isset($_SESSION['e_regulamin']))		// Wyświetla bląd o braku akcpetacji regulaminu
		{
			echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
			unset($_SESSION['e_regulamin']);
		}
	?>
	
	<div class="g-recaptcha" data-sitekey="6LfWwG4UAAAAAHuCnXE1yEIJ2F7wdnd47hb-wUsH"></div>
	
	<?php
	
		if(isset($_SESSION['e_bot']))			// Wyświetla bląd o braku captchy
		{
			echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
			unset($_SESSION['e_bot']);
		}
	?>
	
	<input type="submit" value="Zarejestruj się" />
	<a href="index.php">Powrót</a>
	
	</form>

</body>
</html>
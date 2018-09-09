<?php

	session_start();
	
	if((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno; 
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['pass'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		if($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE login='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if(password_verify($haslo, $wiersz['pass']))
				{
					$_SESSION['zalogowany'] = true;
					
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['login'] = $wiersz['login'];
					$_SESSION['pass'] = $wiersz['pass'];
					$_SESSION['email'] = $wiersz['email'];
					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: egzaminator.php');
				}
				else 
				{
				$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				}
			} else {
				
				$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
			
			}
			
		}
		
		
		$polaczenie->close();
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
<body


</body>
</html>
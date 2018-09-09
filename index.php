<?php
	session_start();
	
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: egzaminator.php');
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
	<style>  
	.error
	{
		color:red;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: 110px;
	}
	</style>
	<div class="wrapper">
		<style>
			#timer{
				font-size: 25px;
				margin-left: 650px;
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
				<div class="bigtitle">Twórcy projektu:</div> <br /> <br />
			<b>Bartosz Ropejko, Marcin Musiał, Mateusz Matysiak, Adam 		Kabatek, Jakub Krzewiński </b> - studenci pierwszego roku Informatyki Stosowanej na Uniwersytecie Technologiczno-Przyrodniczym w Bydgoszczy.
			</div>
			<div style="clear:both;"></div>
		</div>
		<style>
			#content {
				margin-left: 193px;
				margin-right: 100px;
				border-top-right-radius: 10px;
				border-bottom-left-radius: 10px;
				border-top-left-radius: 10px;
				border-bottom-right-radius: 10px;
				min-height: 230px;
				width: 555px;
			}
		</style>
			<div id="content">
				<style>
					span{
						margin-left: 110px;
						font-size: 20px;
					}
				</style>
				<style>
					input{
						margin-left: 75px;
						height: 40px;
						width: 400px;
					}
				</style>
					<form action="zaloguj.php" method="POST">
						<br /> <input type="text" name="login" placeholder="Login" /> <br />
						<br /> <input type="password" name="pass" placeholder="Hasło" /> <br /><br />
				<style>
					button{
						display: block;
						height: 32px; 
						border: none;
						margin-left: 220px;
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
					<button type="submit">Zaloguj się</button>
<?php
	if(isset($_SESSION['blad'])) echo $_SESSION['blad']
?>	
				</form>
				<style>
					a{
						margin-left: 218px;
						text-decoration: none;
					}
				</style>
				<a href="rejestracja.php">Rejestracja</a>
				<br /><br />

			</div>
		
			<div id="footer">
				Platforma e-learningowa w sieci od 2018r &copy
			</div>
			
		</div>
	</div>	
		<script src="scriptjquery-1.11.3.min.js" ></script>
		<script src="script/home.js"></script>

</body>
</html>
<?php
	include_once("analyticstracking.php");

	if (!empty($_GET['language']) ) {

		$_COOKIE['language'] = $_GET['language'] === 'en' ? 'en' : 'pt';

		echo "<script>console.log('".$_COOKIE['language']."');</script>";
	}else {
		$_COOKIE['language'] = 'pt';
	}

	setcookie('language', $_COOKIE['language']);

	$lang='';

	if($_COOKIE['language'] == "en"){

		$lang = "en";
		$teste = file_get_contents('langs/en-US/general.json');
	
	}else{

		$lang = "pt";
		$teste = file_get_contents('langs/pt-BR/general.json');
	}

	$conferences = json_decode($json, true);
	$general = json_decode($teste, true);
?>

<!DOCTYPE html>
<html lang=<?php echo $_COOKIE['language'];?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
		<title><?php echo $general['title']?></title>
		
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

	</head>
	
	<body>

		<!-- idioma -->
		<div class="dropdown">
			<img src="image/icones/icon_lang.png" class="dropdown-toggle world-img" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<ul class="dropdown-menu lang-dropdown" aria-labelledby="dropdownMenu1">
				<li><a class="dropdown-item" href="?language=en">English</a></li>
				<li><a class="dropdown-item" href="?language=pt">Português</a></li>
			</ul>
		</div>

		<!-- Home section -->
		<section class="conference-section" id="home">
			<article>
				<h1 class="title"><?php echo $general['dialogos']?></h1>
				<h1 class="title sub-title">
					<a href="2016/?language=<?php echo $lang; ?>" class="link">2016</a> 
					<a href="2017/?language=<?php echo $lang; ?>" class="link">2017</a>
				</h1>
			</article>
		</section>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script async type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>
</html>
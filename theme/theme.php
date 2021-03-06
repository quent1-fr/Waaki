<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titre_page . ' - ' . $titre_wiki; ?></title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="<?php echo $url_wiki; ?>theme/open-sans.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $url_wiki; ?>theme/style.css" />
		<link rel="icon" type="image/png" href="<?php echo $url_wiki; ?>theme/favicon.png" />
		<?php
			// Permet de charger reCaptcha si activé et si l'on est sur la bonne page
			if($recaptcha === true && $_GET['action'] == 'editer')
				echo '<script src="https://www.google.com/recaptcha/api.js"></script>';
		?>
	</head>
	<body>
		<header><a href="<?php echo $url_wiki; ?>"><?php echo $titre_wiki; ?></a></header>
		<nav><?php echo $menu_wiki; ?></nav>
		<?php echo $contenu_page; ?>
		<footer>Humblement propulsé par <a href="https://github.com/quent1-fr/Waaki">Waaki</a>. <?php echo $footer; ?></footer>
		<!-- Page générée en <?php echo $temps_generation; ?> seconde(s) -->
	</body>
</html>

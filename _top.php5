<?php
  function getmicrotime(){
    list($usec, $sec) = explode(' ', microtime());
	return((float)$usec + (float)$sec);
  }
  $start_time = getmicrotime();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<!-- Entête de la page -->
  <head>
<!-- Modifier le titre du site ici -->
    <title>
      TTB :: Tennis de Table Beaupréau - <?php echo $menu_left[($page*2)] ?>
    </title>	
	
<!-- Déclaration des ressources externes : CSS -->
	<link rel="stylesheet" title="Principale" type="text/css" href="styles/main.css" />
	<link rel="alternate stylesheet" title="Alternative" type="text/css" href="styles/alternative.css" />
	<link rel="alternate stylesheet" title="Bleu" type="text/css" href="styles/main_bleu.css" />
	<link rel="alternate stylesheet" title="Gris" type="text/css" href="styles/main_gris.css" />
	<link rel="alternate stylesheet" title="Foncé" type="text/css" href="styles/main_fonce.css" />
	<link rel="alternate stylesheet" title="Rayé" type="text/css" href="styles/main_raye.css" />
<!-- Déclaration du jeu de caractères utilisé -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<!-- Description et mots clés -->
    <meta name="description" content="Le site du club de tennis de table de Beaupréau" />
	<meta name="keywords" content="tennis de table, table tennis, ping pong, pongiste, sport, TTB, T.T.B, beaupreau, beaupréau, 49600,maine et loire, 49, pays de la loire, mauges, loisir, détente, raquette, balle, français, tennis, table, association, résultat, sportif" />
<!-- Autres méta -->
    <meta http-equiv="Content-Language" content="fr"/>
	<meta name="reply-to" content="ttbeaupreau@free.fr"/>
	<meta name="category" content="Sports"/> 
	<meta name="robots" content="index, follow"/>
	<meta name="distribution" content="global"/>
    <meta name="revisit-after" content="15 days"/>
    <meta name="author" lang="fr" content="Bertrand DELION"/>
	<meta name="copyright" content=""/>
    <meta name="generator" content="Notepad++"/>
	<meta name="identifier-url" content="http://ttbeaupreau.free.fr/"/>
	<meta name="expires" content="never"/>
    <meta name="Date-Creation-yyyymmdd" content="20070428"/>
    <meta name="Date-Revision-yyyymmdd" content="20070508"/>
<!-- Script LightBox -->	
	<script type="text/javascript" src="lightbox/js/prototype.js"></script>
	<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects"></script>
	<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
	<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
  </head>
   
  <body>
    <div id="global">
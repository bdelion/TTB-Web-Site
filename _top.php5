<?php
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
	<link rel="stylesheet" title="main_2.css" type="text/css" href="styles/main_2.css" />
	<link rel="alternate stylesheet" title="main.css" type="text/css" href="styles/main.css" />
	<link rel="alternate stylesheet" title="alternative.css" type="text/css" href="styles/alternative.css" />
	<link rel="alternate stylesheet" title="main_bleu.css" type="text/css" href="styles/main_bleu.css" />
	<link rel="alternate stylesheet" title="main_gris.css" type="text/css" href="styles/main_gris.css" />
	<link rel="alternate stylesheet" title="main_fonce.css" type="text/css" href="styles/main_fonce.css" />
	<link rel="alternate stylesheet" title="main_raye.css" type="text/css" href="styles/main_raye.css" />
	<link rel="alternate stylesheet" title="default.css" type="text/css" href="styles/default.css" />
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
<!-- Script ViaMichelin -->
    <script src="http://api.viamichelin.com/apijs/js/api.1.0.js" type="text/javascript"></script>
	<script type="text/javascript">
	  VMAPI.registerKey("JSGP20070605085845776097242640");
	  function affiche() {
	    map = new VMMap(document.getElementById("yourmapdiv"));
		map.drawMap(new VMLonLat(2,48),8);
	  }
	</script>
<!-- Script Google Maps -->
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAwY5xkSTYkh7LUOpD8xbD4xT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQi63ZrruGbKKjUtBlMt9qbW0uHNA" type="text/javascript"></script>
    <script type="text/javascript">
	//<![CDATA[
	  function load()
	  {
	    if (GBrowserIsCompatible())
		{
		<!-- Crèe une carte aux coordonnées indiquées avec comme troisième paramètre le niveau de zoom -->	
		  var map = new GMap2(document.getElementById("map"));
		  map.setCenter(new GLatLng(47.20305, -0.99833), 16);
		  <!-- Ajoute les barres d'outil de contrôle du Zoom et du Type d'affichage Plan ou Satellite -->
		  map.addControl(new GSmallMapControl());
		  map.addControl(new GMapTypeControl());
		  <!-- Ajoute des marqueurs avec texte s'ouvrant lors des clics. La fonction createMarker est à déclarer une fois -->
		  function createMarker(point, texte)
		  {
		    var marker = new GMarker(point);
			map.addOverlay(marker);
			GEvent.addListener(marker, "click", function() { marker.openInfoWindowHtml(texte); });
		  }
		  <!-- Ajoute des marqueurs sur la carte aux coordonnés passées en paramètre -->
		  var point = new GLatLng(47.20305, -0.99833);
		  var html = '<b>' + 'TTB :: Tennis de Table Beaupréau' + '</b> <br/>' + 'Salle : 3 place du Mai';
		  createMarker(point, html);
		  <!-- Ajoute des marqueurs sur la carte aux coordonnés passées en paramètre -->
		  var point = new GLatLng(47.20293, -0.99921);
		  var html = '<b>' + 'TTB :: Tennis de Table Beaupréau' + '</b> <br/>' + 'Salle : 3 place du Mai';
		  createMarker(point, html);
		}
	  }
	//]]>
	</script>
  </head>
   
  <body onload="load()" onunload="GUnload()">
    <div id="global">
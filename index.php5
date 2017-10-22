<?php
  //error_reporting(E_STRICT);
  error_reporting(E_ALL);
  //error_reporting(0);
  session_start();
  $_SESSION['prenom'] = 'Bertrand';
  $_SESSION['nom'] = 'DELION';
  $_SESSION['age'] = '34';
		  
  $timestamp_expire = time() + 365*24*3600; //Le cookie expire dans un an
  setcookie('pseudo', 'fifiz',$timestamp_expire);
  setcookie('pays', 'France',$timestamp_expire);
  
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 0;
  }
  $menu_left = array ('Accueil', 'accueil', 'Equipes', 'equipes', 'Bureau / Contacts', 'contacts', 'Presse', 'presse', 'T�l�chargement', 'telechargement', 'Saison 2006-2007', 'photos_20062007', 'Saison 2005-2006', 'photos_20052006', 'Dates & Heures', 'dates_heures', 'Mot de passe', 'mot_de_passe', 'SQL Tests', 'sql_tests', 'Cartographie', 'cartographie', 'Mini Chat', 'mini_chat', 'Image Tools', 'image_tools', 'Fonctions cha�nes', 'fonctions_chaines', 'Formulaire', 'formulaire', 'Livre d\'or', 'livre_or', 'News', 'news', 'Les variables superglobales', 'var_superglobale', 'Lecture / �criture dans un fichier', 'fichier', 'Les tableaux', 'array', 'Images', 'images', 'Expressions r�guli�res', 'regex');
  if (($page < 0) OR ($page > 21)) {
    $page = 0;
  }
?>

<?php
  include('includes/mes_fonctions.php5');
  include('includes/ImageTools.class.php5');
  
  $connection = mysql_connect('localhost', 'root', '');
  if ($connection)
  {
    $db_selected = mysql_select_db('test', $connection);
	if ($db_selected)
	{
	  $adresse_ip = get_ip();
/* On enregistre le timestamp de l'adresse IP */
	  $query = "SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip='".$adresse_ip."'";
	  $reponse = mysql_query($query);
	  if (!$reponse)
	    echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
	  $donnees = mysql_fetch_array($reponse);
	  if($donnees['nbre_entrees'] == 0)  //L'ip n'est pas dans la table, on l'ajoute
	    $query = "INSERT INTO connectes VALUES('".$adresse_ip."','".time()."')";
	  else // L'ip est d�j� dans la table, on met � jour son timestamp
	    $query = "UPDATE connectes SET timestamp='".time()."' WHERE ip='".$adresse_ip."'";
	  $reponse = mysql_query($query);
	  if (!$reponse)
	    echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
/* On supprime les adresses IP de la table qui ont un timestamp qui remonte � plus de 5 minutes */
	  $timestamp_5min = time()-(60*5);
	  $query = "DELETE FROM connectes WHERE timestamp<'".$timestamp_5min."'";
	  $reponse = mysql_query($query);
	  if (!$reponse)
	    echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
    }
	else
	  echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
	mysql_close();
  }
  else
    echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
	
  include('_top.php5');
?>
<?php
  include('_header_nav.php5');
?>
<?php
  include('_header.php5');
?>
<?php
  include('_header_log.php5');
?>
<?php
  include('_menu_left.php5');
?>
<?php
  include($menu_left[($page*2)+1].'.php5');
?>
<?php
  include('_menu_right.php5');
?>
<?php
  include('_footer.php5');
?>
<?php
  include('_bottom.php5');
?>
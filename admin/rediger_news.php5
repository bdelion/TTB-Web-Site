<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <!-- Modifier le titre ici -->
    <title>
	  TTB :: Tennis de Table Beaupr�au - Administration des News
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
  </head>
  <body>
    <h2>Ajouter une News</h2>
	<?php
	if(isset($_GET['modifier_news']))
	{
	  $id_news = $_GET['modifier_news'];
	  $connection = mysql_connect('localhost', 'root', '');
	  if ($connection)
	  {
	    $db_selected = mysql_select_db('test', $connection);
	    if ($db_selected)
	    {
	      $reponse = mysql_query("SELECT titre, contenu, pseudo FROM news WHERE id = ".$id_news);
		  if (!$reponse)
		    echo 'Invalid query: ' . mysql_error().' - '.$reponse.'<br/>';
		  $donnees = mysql_fetch_array($reponse);
		  $titre = $donnees['titre'];
		  $contenu = $donnees['contenu'];
		  $pseudo = $donnees['pseudo'];
		}
	    else
	      echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
	    mysql_close();
	  }
	  else
	    echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
	}
	else
	{
	  $id_news = 0;
	  $titre = '';
	  $contenu = '';
	  $pseudo = '';
	}
	?>
	
	<form action='liste_news.php5' method='post'>
	<p>
	  <input type='hidden' name='id_news' value=<?php echo $id_news ?>/>
	  Titre : <input size='30' type='text' name='titre' value='<?php echo $titre ?>'/> <br/>
	  Pseudo : <input size='30' type='text' name='pseudo' value='<?php echo $pseudo ?>'/> <br/>
	  Contenu : <br/><textarea name='contenu' rows='8' cols='40'><?php echo $contenu ?></textarea> <br/>
	  <input type='submit' value='Envoyer' />
	</p>
	</form>
	
	<br/><br/>
	<a href="liste_news.php5">Retour � la liste des News</a>
  </body>
</html>

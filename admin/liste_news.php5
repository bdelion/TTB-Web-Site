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
    <h2>Liste des News</h2>
	<?php
	$connection = mysql_connect('localhost', 'root', '');
	if ($connection)
	{
	  $db_selected = mysql_select_db('test', $connection);
	  if ($db_selected)
	  {
// Ajout ou modification d'une news
	    if(isset($_POST['id_news']) AND isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['pseudo']))
	    {
		  $id_news = $_POST['id_news'];
		  $titre = addslashes(trim($_POST['titre']));
		  $contenu = addslashes(trim($_POST['contenu']));
		  $pseudo = addslashes(trim($_POST['pseudo']));
// Ajout d'une news
		  if($id_news == 0)
		  {
		    $query = "INSERT INTO news VALUES(DEFAULT, '".$titre."', '".$contenu."', '".time()."', '".time()."', '".$pseudo."')";
			$reponse = mysql_query($query);
			if (!$reponse)
			  echo 'Invalid query AJOUT : ' . mysql_error().' - '.$reponse.'<br/>';
		  }
// Modification d'une news
		  else
		  {
		    $query = "UPDATE news SET titre='".$titre."', contenu='".$contenu."', timestamp_modif='".time()."', pseudo='".$pseudo."' WHERE id='".$id_news."'";
			$reponse = mysql_query($query);
			if (!$reponse)
			  echo 'Invalid query MODIF : ' . mysql_error().' - '.$reponse.'<br/>';
		  }
	    }
// Suppression d'une fiche
		if(isset($_GET['supprimer_news']))
		{
		   $query = "DELETE FROM news WHERE id=".$_GET['supprimer_news'];
		   $reponse = mysql_query($query);
		   if (!$reponse)
		     echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
		}
// Affichage de la liste des news
        $query = "SELECT id, titre, timestamp FROM news ORDER BY timestamp DESC";
		$reponse = mysql_query($query);
		if (!$reponse)
		  echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
    ?>
		<table>
		  <tr>
		    <th>Modifier</th>
			<th>Supprimer</th>
			<th>Titre</th>
			<th>Date</th>
		  </tr>
	<?php
		while ($donnees = mysql_fetch_array($reponse))
		{
	?>
		  <tr>
		    <th><a href=rediger_news.php5?modifier_news="<?php echo $donnees['id']; ?>">Modifier</a></th>
			<th><a href=liste_news.php5?supprimer_news="<?php echo $donnees['id'] ?>">Supprimer</a></th>
			<th><?php echo $donnees['titre']; ?></th>
			<th><?php echo date('d/m/Y - H:i:s', $donnees['timestamp']); ?></th>
		  </tr>
	<?php		
		}
	?>
		</table>
	<?php
		
	  }
	  else
	    echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
	  mysql_close();
	}
	else
	  echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
	?>
	<br/><br/>
	<a href="rediger_news.php5">Ajouter une news</a>
	<a href="../index.php5">Acceuil</a>
  </body>
</html>

<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		  <?php echo $menu_left[($page*2)]; ?>
		  </h2>
		  
		  <p>
		    <a href="admin/liste_news.php5">Administrer les News</a> | <a href="admin/liste_news.php5">Proposer une News</a>
		  </p>
		  
		  <?php
		  $connection = mysql_connect('localhost', 'root', '');
		  echo 'Connection'.$connection.'<br/>';
		  if ($connection)
		  {
		    $db_selected = mysql_select_db('test', $connection);
			if ($db_selected)
			{
			  $query = "SELECT titre, contenu, timestamp, timestamp_modif, pseudo FROM news ORDER BY timestamp DESC LIMIT 0, 5";
			  $reponse = mysql_query($query);
			  if (!$reponse)
			    echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
			  while ($donnees = mysql_fetch_array($reponse))
			  {
		  ?>
		        <h5>
		        <?php echo $donnees['titre'];?> :: 
				<em> Créé par <?php echo $donnees['pseudo']; ?> le
				<?php
				echo date('d/m/Y à H:i:s', $donnees['timestamp']);
				if ($donnees['timestamp_modif'] != 0)
				{
				?>
				   et modifié le <?php echo date('d/m/Y à H:i:s', $donnees['timestamp_modif']); ?>
				<?php
				}
				?>
				</em></h5>
				<p><?php echo nl2br(stripslashes($donnees['contenu'])); ?></p>
		  <?php
			  }
			}
			else
			  echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
			mysql_close();
		  }
		  else
		    echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
		  ?>
        </div>
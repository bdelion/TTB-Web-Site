<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
		  <h3>Livre d'or des tutoriaux du SiteDuZéro.com.</h3>
		  <?php
		  //Connexion à MySql - Opens a connection to a mySQL server
		  $connection = mysql_connect('localhost', 'root', '396549');
		  if ($connection)
		  {
			//Sélection de la base - Set the active mySQL database
			$db_selected = mysql_select_db('test', $connection);
			if ($db_selected)
			{
//Si un message est envoyé on l'enregistre
		      if (isset($_POST['pseudo']) AND isset($_POST['message'])) //Si les variables existent
			  {
			    if ($_POST['pseudo'] != NULL AND $_POST['message'] != NULL) //Si les variables ne sont pas vides
				{
				  //On utilise htmlentities pour éviter d'enregistrer du code html dans la base
				  /* $pseudo = htmlentities($_POST['pseudo']);
				     $message = htmlentities($_POST['message']); */
				  $pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
				  $note = intval($_POST['note']);
				  /* $message = nl2br(mysql_real_escape_string(htmlspecialchars(trim($_POST['message'])))); */
				  $message = nl2br(htmlentities(trim($_POST['message']), ENT_QUOTES));
				  //Requête SQL - 
				  $query = "INSERT INTO livre_or VALUES(DEFAULT, '$pseudo', '$message', $note)";
				  $reponse = mysql_query($query);
				  if (!$reponse)
					echo 'Invalid query : ' . mysql_error().'<br/>';
				}
			  }
//On calcule le nbre de messages
			  $reponse = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM livre_or');
			  if (!$reponse)
			    echo 'Invalid query: ' . mysql_error().'<br/>';
			  $donnees = mysql_fetch_array($reponse);
			  $nbr_message = $donnees['nbre_entrees'];
//On calcule la note moyenne
			  $reponse = mysql_query('SELECT SUM(note) AS total_note FROM livre_or');
			  if (!$reponse)
			    echo 'Invalid query: ' . mysql_error().'<br/>';
			  $donnees = mysql_fetch_array($reponse);
			  $moyenne = round($donnees['total_note']/$nbr_message, 2);
		  ?>
<!-- On définit les éléments du formulaire -->
		      <form action='index.php5?page=15' method='post'>
			  <p>Mon site vous plaît ? Laissez-moi un message !</p>
			  <p>
			    Pseudo :<br/>
				<input type='text' name='pseudo'
			    <?php
			    if (isset($_POST['pseudo']))
				  echo 'value = "'.$_POST['pseudo'].'"';
				?> />
				Note :
				<select name='note'>
				<?php
				for($i=0; $i<=20; $i++)
				  echo '<option value='.$i.'>'.$i.'</option>';
				?>
				</select><br/>
				Message :<br/>
				<textarea name='message' rows='8' cols='40'>Votre message ici !</textarea> <br/>
				<input type='submit' value='Envoyer' />
			  </p>
			  </form>
				
			  <p class='pages'>
			    Il y a actuellement <?php echo $nbr_message ?> messages pour une note moyenne de <?php echo $moyenne; ?>/20.<br/>
				<?php
//On écrit les liens vers chacune des pages
				if (isset($_GET['page_livre_or']))
				  $num_page_courante = intval($_GET['page_livre_or']);
			    else
				  $num_page_courante = 1;
				$nbr_message_par_page = 5;
				$nbr_page = ceil($nbr_message/$nbr_message_par_page);
				echo 'Page :';
				for($num_page = 1; $num_page <= $nbr_page; $num_page++)
				{
				  if ($num_page_courante == $num_page)
				    echo ' '.$num_page.' ';
				  else
					echo ' <a href="index.php5?page=15&page_livre_or='.$num_page.'">'.$num_page.'</a> ';
				}
				?>
			  </p>
				
			  <?php
//On affiche les messages
			  $premier_message_afficher = ($num_page_courante-1)*$nbr_message_par_page;
			  $reponse = @mysql_query("SELECT * FROM livre_or ORDER BY ID DESC LIMIT ".$premier_message_afficher.",".$nbr_message_par_page);
			  if (!$reponse)
			    echo 'Invalid query: ' . mysql_error().'<br/>';
			  while ($donnees = mysql_fetch_array($reponse))
			  {
			  ?>
			    <p>
				  <strong><?php echo $donnees['pseudo']; ?></strong> a écrit : (<?php echo $donnees['note']; ?>)<br/>
				  <?php echo $donnees['message'] ?>
				</p>
			  <?php
			  }
			}
			else
			  echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
			mysql_close(); //Déconnexion de MySql
		  }
		  else
		    echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
		      ?>
        </div>
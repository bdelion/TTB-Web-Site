<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
		  <h3>Mini Chat des tutoriaux du SiteDuZéro.com.</h3>
		  <?php
		    if (isset($_POST['pseudo']) AND isset($_POST['message'])) {//Si les variables existent
			  if ($_POST['pseudo'] != NULL AND $_POST['message'] != NULL) {//Si les variables ne sont pas vides
			    //Connexion à MySql - Opens a connection to a mySQL server
				$connection=mysql_connect ('localhost', 'root', '396549');
				if (!$connection)
				{
				  die('Not connected : ' . mysql_error());
				}
				
				//Sélection de la base - Set the active mySQL database
			    $db_selected = mysql_select_db('test', $connection);
				if (!$db_selected)
				{
				  die ('Can\'t use db : ' . mysql_error());
				}
				
				//On utilise htmlentities pour éviter d'enregistrer du code html dans la base
/* 				$pseudo = htmlentities($_POST['pseudo']);
				$message = htmlentities($_POST['message']); */
				$pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
				$message = mysql_real_escape_string(htmlspecialchars(trim($_POST['message'])));
				
				//Requête SQL - 
				$query = "INSERT INTO mini_chat VALUES(DEFAULT, '$pseudo', '$message')";
				$result = mysql_query($query);
				if (!$result)
				{
				  die('Invalid query: ' . mysql_error());
				}
								
				mysql_close(); //Déconnexion de MySql
			  }
		    }
		  ?>
		  <form action='index.php5?page=11' method='post'>
		    <p>
			  Pseudo : <input type='text' name='pseudo' 
			  <?php
			    if (isset($_POST['pseudo']))
			    {
			      echo 'value = "'.$_POST['pseudo'].'"';
			    }
			  ?> /><br/>
			  Message : <input type='text' name='message' /><br/>
			  <input type='submit' value='Envoyer' />
			</p>
		  </form>
		  <?php
		    mysql_connect("localhost","root","396549") or die (mysql_error()); //Connexion à MySql
			mysql_select_db("test") or die (mysql_error()); //Sélection de la base
			$reponse = mysql_query("SELECT * FROM mini_chat ORDER BY ID DESC LIMIT 0,10") or die (mysql_error()); //On récupère les 10 derniers messages
			mysql_close(); //Déconnexion de MySql
			while ($donnees = mysql_fetch_array($reponse)) {
		  ?>
		      <p><strong><?php echo $donnees['pseudo']; ?></strong> : <?php echo $donnees['message'] ?></p>
		  <?php
			}
		  ?>
        </div>
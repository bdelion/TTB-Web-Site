<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
		  <h3>Page des tests des tutoriaux du SiteDuZéro.com.</h3>
		  <p>
		    <?php
 		      mysql_connect("localhost","root","396549") or die (mysql_error()); //or die ('Impossible de se connecter à la base de données !') ; //Connexion à MySql
			  mysql_select_db("test") or die (mysql_error()); //or die ('Impossible de sélectionner la base de données !'); //Sélectionde la base
			?>
			
			<h4>Affichage de l'ensemble des données</h4>
			<?php
			  $reponse = mysql_query('SELECT * FROM jeux_videos') or die (mysql_error()); //Requête SQL
			  while ($donnees = mysql_fetch_array($reponse)) { //Boucle pour lister tout ce que contient la table
			?>
			<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom'];?> <br/>
			Le possesseur de ce jeu est : <?php echo $donnees['possesseur'];?> et il le vend à <?php echo $donnees['prix'];?> euros !<br/>
			Ce jeu fonctionne sur <?php echo $donnees['console'];?> et on peut y jour à <?php echo $donnees['nbre_joueurs_max'];?> au maximum <br/>
			<?php echo $donnees['possesseur'];?> a laissé ces commentaires sur <?php echo $donnees['nom'];?> : <em><?php echo $donnees['commentaires'];?></em>
			</p>
			<?php
			  }
			?>
			
			<h4>Affichage des jeux de Patrick dont le prix est inférieur à 20 €</h4>
			<?php
			  $reponse = mysql_query('SELECT * FROM jeux_videos WHERE possesseur=\'Patrick\' AND prix < 20') or die (mysql_error()); //Requête SQL
			  while ($donnees = mysql_fetch_array($reponse)) { //Boucle pour lister tout ce que contient la table
			?>
			<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom'];?> <br/>
			Le possesseur de ce jeu est : <?php echo $donnees['possesseur'];?> et il le vend à <?php echo $donnees['prix'];?> euros !<br/>
			Ce jeu fonctionne sur <?php echo $donnees['console'];?> et on peut y jour à <?php echo $donnees['nbre_joueurs_max'];?> au maximum <br/>
			<?php echo $donnees['possesseur'];?> a laissé ces commentaires sur <?php echo $donnees['nom'];?> : <em><?php echo $donnees['commentaires'];?></em>
			</p>
			<?php
			  }
			?>
			
			<h4>Affichage des jeux dans l'ordre croissant des prix</h4>
			<?php
			  $reponse = mysql_query('SELECT * FROM jeux_videos ORDER BY prix') or die (mysql_error()); //Requête SQL
			  while ($donnees = mysql_fetch_array($reponse)) { //Boucle pour lister tout ce que contient la table
			?>
			<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom'];?> <br/>
			Le possesseur de ce jeu est : <?php echo $donnees['possesseur'];?> et il le vend à <?php echo $donnees['prix'];?> euros !<br/>
			Ce jeu fonctionne sur <?php echo $donnees['console'];?> et on peut y jour à <?php echo $donnees['nbre_joueurs_max'];?> au maximum <br/>
			<?php echo $donnees['possesseur'];?> a laissé ces commentaires sur <?php echo $donnees['nom'];?> : <em><?php echo $donnees['commentaires'];?></em>
			</p>
			<?php
			  }
			?>
			
			<h4>Affichage des 10 premières entrées</h4>
			<?php
			  $reponse = mysql_query('SELECT * FROM jeux_videos LIMIT 0,10') or die (mysql_error()); //Requête SQL
			  while ($donnees = mysql_fetch_array($reponse)) { //Boucle pour lister tout ce que contient la table
			?>
			<p>
			<strong>Jeu</strong> : <?php echo $donnees['nom'];?> <br/>
			Le possesseur de ce jeu est : <?php echo $donnees['possesseur'];?> et il le vend à <?php echo $donnees['prix'];?> euros !<br/>
			Ce jeu fonctionne sur <?php echo $donnees['console'];?> et on peut y jour à <?php echo $donnees['nbre_joueurs_max'];?> au maximum <br/>
			<?php echo $donnees['possesseur'];?> a laissé ces commentaires sur <?php echo $donnees['nom'];?> : <em><?php echo $donnees['commentaires'];?></em>
			</p>
			<?php
			  }
			?>
			
			<h4>Affichage du nombre d'entrées</h4>
			<?php
			  $reponse = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM jeux_videos') or die (mysql_error()); //Requête SQL
			  $donnees = mysql_fetch_array($reponse)
			?>
			Il y a <?php echo $donnees['nbre_entrees']; ?> jeux vidéos en vente !
			
			<h4>Ajout d'un jeu à Patrick</h4>
			<?php
			  $reponse = mysql_query("INSERT INTO jeux_videos VALUES(DEFAULT, 'Battlefield 1942', 'Patrick', 'PC', '45', '50', '2nde guerre mondiale')") or die (mysql_error()); //Requête SQL
			?>
			
			<h4>Modification d'un jeu à Patrick</h4>
			<?php
			  $reponse = mysql_query("UPDATE jeux_videos SET prix='10', nbre_joueurs_max='32' WHERE ID='51'") or die (mysql_error()); //Requête SQL
			?>
			
			<h4>Suppression d'un jeu à Patrick</h4>
			<?php
			  $reponse = mysql_query("DELETE FROM jeux_videos WHERE nom='Battlefield 1942'") or die (mysql_error()); //Requête SQL
			?>
			
			<?php
			  mysql_close(); //Déconnexion de MySql
			?>
		  </p>
        </div>
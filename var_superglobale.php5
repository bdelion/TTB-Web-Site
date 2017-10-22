<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
          <p>
		    $_SERVER['PHP_SELF'] : <?php echo $_SERVER['PHP_SELF']; ?> <br/>
			$_SERVER['HTTP_REFERER'] : <?php echo $_SERVER['HTTP_REFERER']; ?> <br/>
			$_SERVER['REMOTE_ADDR'] : <?php echo $_SERVER['REMOTE_ADDR']; ?> <br/>
		  </p>
		  <h3>Sessions :</h3>
          <p>
		    Prénom : <?php echo $_SESSION['prenom']; ?> <br/>
			Nom : <?php echo $_SESSION['nom']; ?> <br/>
			Age : <?php echo $_SESSION['age']; ?> <br/>
		  </p>
		  <h3>Cookies :</h3>
          <p>
		    Pseudo : <?php echo $_COOKIE['pseudo']; ?> <br/>
			Pays : <?php echo $_COOKIE['pays']; ?> <br/>
		  </p>
        </div>
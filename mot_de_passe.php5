<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
          <p>
		    <?php
			  if (isset($_POST['mot_de_passe'])) {
			    $mot_de_passe = $_POST['mot_de_passe'];
			  }
			  else {
			    $mot_de_passe = '';
			  }
			
			  if ($mot_de_passe == 'fifiz') {
			?>
			    <h3>Codes secret du site de la NASA</h3>
			    <h4>BKLSL LLKJJ IOoIK UAPDK</h4>
			    <p>
			      Cette page est r�serv�e au personnel de la NASA. N'oubliez pas de la visiter r�guli�rement car les codes d'acc�s sont chang�s toutes les semaines.<br/>
			      La NASA vous remercie de votre visite.
			    </p>
			<?php
			  }
			  else {
			?>
			    <p>Veuillez entrer le mot de passe pour obtenir les codes d'acc�s au serveur central de la NASA :</p>
			    <form action="index.php?page=8" method="post">
			      <p>
				    <input type="text" name="mot_de_passe"/>
				    <input type="submit" value="Valider"/>
				  </p>
			    </form>
			    <p>Cette page est r�serv�e au personnel de la NASA. Si vous ne travaillez pas � la NASA, inutile d'insister vous ne trouverez jamais le mot de passe ! ;-)</p>
			<?php
			    if (isset($_POST['mot_de_passe'])) {
		    ?>
			      <p style="color: red;">Erreur de mot de passe !</p>
			<?php	
			    }
			  }
			?>
		  </p>
        </div>
<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
		  <form action='index.php5?page=14' method='post'>
		    Text : 
			<input type='text' name='variable_pseudo'
			<?php
			  if (isset($_POST['variable_pseudo']))
			  {
			    echo 'value = "'.$_POST['variable_pseudo'].'"';
			  }
			?>
			/> <br/>	
			Password : 
			<input type='password' name='variable_mdp' value='valeur par défaut'/> <br/>
			Textarea :
			<textarea name='variable_textarea' rows='8' cols='45'>Votre message ici !</textarea> <br/>
			Liste déroulante :
			<select name='variable_select'>
			  <option value='choix1'>Choix 1</option>
			  <option value='choix2' selected='selected'>Choix 2</option>
			  <option value='choix3'>Choix 3</option>
			  <option value='choix4'>Choix 4</option>
			</select> <br/>
			Case à cocher : 
			<input type='checkbox' name='variable_checkbox' checked='checked'/> <br/>
			Boutons d'option : 
			<input type='radio' name='variable_radio' value='oui' checked='checked' /> Oui
			<input type='radio' name='variable_radio' value='non' /> Non <br /><br/>
			<input type='submit' value='Valider' /> <br/><br/><br/><br/>
		  </form>
		  <p>
		    Pseudo : <?php echo htmlentities($_POST['variable_pseudo']) ?> - Mot de passe : <?php echo htmlentities($_POST['variable_mdp']) ?> <br/>
			Textarea : <?php echo $_POST['variable_textarea'] ?> <br/>
			Liste déroulante : <?php echo $_POST['variable_select'] ?> <br/>
			Case à cocher : <?php echo $_POST['variable_checkbox'] ?> <br/>
			Boutons d'option : <?php echo $_POST['variable_radio'] ?> <br/>
		  </p>
        </div>
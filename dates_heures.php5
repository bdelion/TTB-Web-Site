<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
          <p>
			<?php
			  $jour = date('d');
			  $mois = date('m');
			  $annee = date('Y');
			  $heure = date('H');
			  $minute = date('i');
			  echo $jour.'/'.$mois.'/'.$annee.' - '.$heure.':'.$minute;
			?>
		  </p>
          <p>
			<?php
			  echo date('d/m/Y - H:i:s').'<br/>';
			  if (date('I') == 1)
			    echo 'L\'heure d\'été est activée'.'<br/>';
			  else
			    echo 'L\'heure d\'été n\'est pas activée'.'<br/>';
			  echo 'Différence d\'heure avec Greenwich : '.date('O').'<br/>';
			  echo date('d/m/y - H:i:s').'<br/>';
			  if (date('L') == 1)
			    echo 'L\'année est bissextile'.'<br/>';
			  else
			    echo 'L\'année n\'est pas bissextile'.'<br/>';
			  echo date('l d F Y').'<br/>';
			  echo 'Le mois possède '.date('t').' jours'.'<br/>';
			  echo 'Le numéro du jour dans la semaine est '.date('w').'<br/>';
			  echo 'Le numéro de la semaine dans l\'année est '.date('W').'<br/>';
			  echo 'Le numéro du jour dans l\'année est '.date('z').'<br/>';
			?>
		  </p>
		  <p>
			<?php
			  $timestamp = 1080513608;
			  echo date('d/m/Y - H:i:s', $timestamp).'<br/>';
			  $timestamp = mktime(22,07, 0, 06, 1, 2007);
			  echo 'Le $timestamp est '.$timestamp.'<br/>';
			?>
		  </p>
		  <?php
			if (isset($_POST['jour']) AND isset($_POST['mois']) AND isset($_POST['an']))
			{
			  $timestamp_naissance = mktime(0, 0, 0, $_POST['jour'], $_POST['mois'], $_POST['an']);
			  $numero_jour = date('w', $timestamp_naissance);
			  $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
			  $jour_naissance = $jours[$numero_jour];
			  echo '<p>Vous êtes né un '.$jour_naissance.'</p>';
			}
		  ?>
		  <p>Indiquez votre date de naissance (jj/mm/aaa)</p>
		  <form method='post' action='index.php5?page=7'>
		    <p>
			  <input type='text' name='jour' size='2' maxlength='2'/>/
			  <input type='text' name='mois' size='2' maxlength='2'/>/
			  <input type='text' name='an' size='4' maxlength='4'/><br/><br/>
			  <input type='submit' value='Envoyer'/>
			</p>
		  </form>
        </div>
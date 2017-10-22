<!-- Barre de login, date, nombre de visiteurs -->
      <div id="header_log">
		<p>Pseudo : - Mot de passe : - OK - [inscription] [mot de passe oublié] | 
        <?php
          setlocale(LC_TIME,'fr_FR','fr','fr_FR.ISO8859-1','French','france','fra','french','FR');
          $date=strftime('%A %d %B %Y');
		  echo $date;
		?> | 
		<?php
		  $heure=strftime('%H:%M:%S');
		  echo $heure;
		?>
		</p>
      </div>
<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2><?php echo $menu_left[($page*2)]; ?></h2>
          <h3>print_r</h3>
		  <?php
		  $coordonnees = array (
		    'Prénom' => 'Bertrand',
			'Nom' => 'DELION',
			'Adresse' => '15 bis, rue du buisson',
			'Code postal' => '79430',
			'Ville' => 'La Chapelle Saint Laurent'
		  );
		  echo '<pre>';
		  print_r($coordonnees);
		  echo '</pre>';
		  ?>
		  <?php
		  $connection = mysql_connect('localhost', 'root', '396549');
		  $db_selected = mysql_select_db('test', $connection);
		  $reponse = mysql_query("SELECT * FROM news ORDER BY ID DESC");
		  while ($donnees = mysql_fetch_array($reponse))
		  {
		    echo '<pre>';
			print_r($donnees);
			echo '</pre>';
		  }
		  ?>
		  <h3>foreach</h3>
		  <?php
		  foreach($coordonnees as $element)
		  {
		    echo $element.'<br/>';
		  }
		  ?>
		  <br/>
		  <?php
		  foreach($coordonnees as $cle => $element)
		  {
		    echo '['.$cle.'] vaut '.$element.'<br/>';
		  }
		  ?>
		  <h3>array_key_exists</h3>
		  <?php
		  if(array_key_exists('Nom', $coordonnees))
		    echo 'La clé "Nom" se trouve dans les coordonnées';
		  if(array_key_exists('Pays', $coordonnees))
		    echo 'La clé "Pays" se trouve dans les coordonnées';
		  ?>
		  <h3>in_array</h3>
		  <?php
		  if(in_array('DELION', $coordonnees))
		    echo 'La valeur "DELION" se trouve dans les coordonnées';
		  if(in_array('VINCENT', $coordonnees))
		    echo 'La clé "VINCENT" se trouve dans les coordonnées';
		  ?>
		  <h3>array_search</h3>
		  <?php
		  $position = array_search('Bertrand', $coordonnees);
		  echo '"Bertrand" se trouve en position '.$position.'<br/>';
		  $position = array_search('79430', $coordonnees);
		  echo '"79430" se trouve en position '.$position;
		  ?>
		  <h3>Chaîne en array</h3>
		  <?php
		  $chaine_date = '01/09/1973';
		  $array_chaine = explode('/', $chaine_date);
		  echo '<pre>';
		  print_r($array_chaine);
		  echo '</pre>';
		  ?>
        </div>
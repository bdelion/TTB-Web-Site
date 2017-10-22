<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
          <p>
		    <h3>addslashes :</h3> 
			<?php
			  $variable = 'Elvis Presley était le "King", y\'a aucun doute';
			  echo 'Avant : '.$variable.'<br/> Après : '.addslashes($variable);
			?>
			<h3>stripslashes :</h3> 
			<?php
			  $variable = addslashes($variable);
			  echo 'Avant : '.$variable.'<br/> Après : '.stripslashes($variable);
			?>
			<h3>htmlentities :</h3> 
			<?php
			  $variable = '<em>Ceci est une variable qui contient du xHTML</em>';
			  echo 'Avant : '.$variable.'<br/> Après : '.htmlentities($variable);
			?>
			<h3>nl2br :</h3> 
			<?php
			  $variable = 'Ceci est la première ligne.
			               Ceci est la seconde ligne.
						   Ceci est la troisième ligne.
						   Allez on s\'arrête là !';
			  echo 'Avant : '.$variable.'<br/> Après : '.nl2br($variable);
			?>
			<h3>strlen :</h3> 
			<?php
			  $variable = 'Bonjour à vous, je suis une phrase !';
			  echo 'Cette phrase contient '.strlen($variable).' caractères.';
			?>
			<h3>str_replace :</h3> 
			<?php
			  $variable = 'bim bam boum';
			  echo 'Avant : '.$variable.'<br/> Après : '.str_replace('b', 'p', $variable);
			?>
			<h3>str_shuffle :</h3> 
			<?php
			  $variable = 'Cette chaîne va être mélangée !';
			  echo 'Avant : '.$variable.'<br/> Après : '.str_shuffle($variable);
			?>
			<h3>strtolower :</h3> 
			<?php
			  $variable = 'COMMENT CA JE CRIE TROP FORT ???';
			  echo 'Avant : '.$variable.'<br/> Après : '.strtolower($variable);
			?>
			<h3>strtoupper :</h3> 
			<?php
			  $variable = 'Comment ça je crie trop fort ???';
			  echo 'Avant : '.$variable.'<br/> Après : '.strtoupper($variable);
			?>
			<h3>variable variable :</h3> 
			<?php
			  $afficher = 'pays';
			  $ville = 'Beaupréau';
			  $pays = 'France';
			  $continent = 'Europe';
			  
			  echo strtoupper($afficher).' : '.${$afficher};
			?>
		  </p>
        </div>
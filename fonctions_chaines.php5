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
			  $variable = 'Elvis Presley �tait le "King", y\'a aucun doute';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.addslashes($variable);
			?>
			<h3>stripslashes :</h3> 
			<?php
			  $variable = addslashes($variable);
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.stripslashes($variable);
			?>
			<h3>htmlentities :</h3> 
			<?php
			  $variable = '<em>Ceci est une variable qui contient du xHTML</em>';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.htmlentities($variable);
			?>
			<h3>nl2br :</h3> 
			<?php
			  $variable = 'Ceci est la premi�re ligne.
			               Ceci est la seconde ligne.
						   Ceci est la troisi�me ligne.
						   Allez on s\'arr�te l� !';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.nl2br($variable);
			?>
			<h3>strlen :</h3> 
			<?php
			  $variable = 'Bonjour � vous, je suis une phrase !';
			  echo 'Cette phrase contient '.strlen($variable).' caract�res.';
			?>
			<h3>str_replace :</h3> 
			<?php
			  $variable = 'bim bam boum';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.str_replace('b', 'p', $variable);
			?>
			<h3>str_shuffle :</h3> 
			<?php
			  $variable = 'Cette cha�ne va �tre m�lang�e !';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.str_shuffle($variable);
			?>
			<h3>strtolower :</h3> 
			<?php
			  $variable = 'COMMENT CA JE CRIE TROP FORT ???';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.strtolower($variable);
			?>
			<h3>strtoupper :</h3> 
			<?php
			  $variable = 'Comment �a je crie trop fort ???';
			  echo 'Avant : '.$variable.'<br/> Apr�s : '.strtoupper($variable);
			?>
			<h3>variable variable :</h3> 
			<?php
			  $afficher = 'pays';
			  $ville = 'Beaupr�au';
			  $pays = 'France';
			  $continent = 'Europe';
			  
			  echo strtoupper($afficher).' : '.${$afficher};
			?>
		  </p>
        </div>
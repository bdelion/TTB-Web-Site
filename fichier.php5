<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2><?php echo $menu_left[($page*2)]; ?></h2>
          
		  <h3>Lecture</h3>
		  <p>
		  Nbre d'entrées : 
		  <?php
		  $res_fichier = fopen('admin/compteurs.txt', 'r+');
		  $ligne = fgets($res_fichier);
		  fclose($res_fichier);
		  echo $ligne;
		  ?>
		  </p>
		  <h3>Ecriture</h3>
		  <?php
		  $res_fichier = fopen('admin/compteurs.txt', 'r+');
		  $ligne = fgets($res_fichier);
		  $ligne++;
		  fseek($res_fichier, 0);
		  fputs($res_fichier, $ligne);
		  fclose($res_fichier);
		  echo $ligne;
		  ?>
        </div>
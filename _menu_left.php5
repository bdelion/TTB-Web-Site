<!-- Zone centrale, qui contient un menu à gauche et à droite ainsi que le corps du site -->
      <div id="center">
<!-- Menu gauche -->
        <div id="menu_left">
<!-- Menu principal -->         
          <div class="menu">
            <h3>Menu principal</h3>
            <ul>
			  <?php
			    $ligne_menu = "";
				for ($num_menu = 0; $num_menu < 10; $num_menu=$num_menu+2) {
				  $ligne_menu = $ligne_menu.'<li';
				  if ($page == ($num_menu/2)) {
				    $ligne_menu = $ligne_menu.' class="sel">'.$menu_left[$num_menu].'</li>';
				  }
				  else {
				    $ligne_menu = $ligne_menu.'><a href="index.php5?page='.($num_menu/2).'">'.$menu_left[$num_menu].'</a></li>';
				  }
				}
				echo $ligne_menu;
			  ?>
<!--               <li class="sel"><a href="index.php">Acceuil</a></li>
              <li><a href="#">Equipes</a></li>
              <li><a href="#">Bureau / Contacts</a></li>
              <li><a href="#">Presse</a></li>
              <li><a href="index.php?page=telechargement">Téléchargement</a></li> -->
            </ul>
          </div>
<!-- Menu photos -->
          <div class="menu">
            <h3>Photos</h3>
            <ul>
			  <?php
			    $ligne_menu = "";
				for ($num_menu = 10; $num_menu < 14; $num_menu=$num_menu+2) {
				  $ligne_menu = $ligne_menu.'<li';
				  if ($page == ($num_menu/2)) {
				    $ligne_menu = $ligne_menu.' class="sel">'.$menu_left[$num_menu].'</li>';
				  }
				  else {
				    $ligne_menu = $ligne_menu.'><a href="index.php5?page='.($num_menu/2).'">'.$menu_left[$num_menu].'</a></li>';
				  }
				}
				echo $ligne_menu;
			  ?>
<!--               <li><a href="#">Saison 2006-2007</a></li>
			  <li><a href="photos_20052006.php">Saison 2005-2006</a></li> -->
            </ul>
          </div>
<!-- Menu prochainement -->
          <div class="menu">
            <h3>Prochainement</h3>
            <ul>
              <li><a href="#">Saison 2006-2007</a></li>
            </ul>
          </div>
<!-- Menu autres -->
          <div class="menu">
            <h3>Page de tests</h3>
            <ul>
			  <?php
			    $ligne_menu = "";
				for ($num_menu = 14; $num_menu < 44; $num_menu+=2) {
				  $ligne_menu = $ligne_menu.'<li';
				  if ($page == ($num_menu/2)) {
				    $ligne_menu = $ligne_menu.' class="sel">'.$menu_left[$num_menu].'</li>';
				  }
				  else {
				    $ligne_menu = $ligne_menu.'><a href="index.php5?page='.($num_menu/2).'">'.$menu_left[$num_menu].'</a></li>';
				  }
				}
				echo $ligne_menu;
			  ?>
            </ul>
          </div>
        </div>

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
				for ($num_menu = 0; $num_menu < 6; $num_menu=$num_menu+2) {
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
          <div class="menu">
            <h3>Autres</h3>
            <ul>
			  <li><a href="../archives/">Archives</a></li>
            </ul>
          </div>
        </div>

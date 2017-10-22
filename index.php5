<?php
/* Si page est définit, on affecte la valeur à la variable, sinon on initialise à 0 */
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 0;
  }
/* Initialisation du tableau des menus, on associe le nom de la ligne de menu au nom de la page : Page, page pour le menu Page lié au fichier page.php5 qui sera le contenu affiché dans la zone content */
  $menu_left = array ('Accueil', 'accueil', 'Contacts', 'contacts', 'Saison 2007/2008', 'saison20072008');
  if (($page < 0) OR ($page >= 3)) {
    $page = 0;
  }
?>

<?php
  include('includes/mes_fonctions.php5');
  include('_top.php5');
?>
<?php
  include('_header_nav.php5');
?>
<?php
  include('_header.php5');
?>
<?php
  include('_header_log.php5');
?>
<?php
  include('_menu_left.php5');
?>
<?php
/* Affichage de la page à partir des éléments du tableau cf plus haut */
  include($menu_left[($page*2)+1].'.php5');
?>
<?php
  include('_menu_right.php5');
?>
<?php
  include('_footer.php5');
?>
<?php
  include('_bottom.php5');
?>
<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2><?php echo $menu_left[($page*2)]; ?></h2>
		  <?php
$res_img_source = imagecreatefrompng('photos/20052006/20060409/IMG_0384.png');
$res_img_destination = imagecreatetruecolor(200, 150);

$largeur_source = imagesx($res_img_source);
$hauteur_source = imagesy($res_img_source);
$largeur_destination = imagesx($res_img_destination);
$hauteur_destination = imagesy($res_img_destination);

imageCopyResized($res_img_destination, $res_img_source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

imagepng($res_img_destination, 'mini2.png');
?>
		  <img src='mini.png' />
		  <img src='mini2.png' />
        </div>
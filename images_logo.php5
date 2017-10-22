<?php
$res_img_source = imagecreatefrompng('photos/20052006/20060409/IMG_0384.png');
$res_img_destination = imagecreatetruecolor(200, 150);

$largeur_source = imagesx($res_img_source);
$hauteur_source = imagesy($res_img_source);
$largeur_destination = imagesx($res_img_destination);
$hauteur_destination = imagesy($res_img_destination);

imagecopyresampled($res_img_destination, $res_img_source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

imagepng($res_img_destination, 'mini.png');
?>

<?php
/* header('Content-type: image/png');

$res_img_source = imagecreatefrompng('images/badges/php-power-micro.png');
$res_img_destination = imagecreatefrompng('photos/20052006/20060409/IMG_0384.png');

$largeur_source = imagesx($res_img_source);
$hauteur_source = imagesy($res_img_source);
$largeur_destination = imagesx($res_img_destination);
$hauteur_destination = imagesy($res_img_destination);

$position_x = $largeur_destination-$largeur_source-2;
$position_y = $hauteur_destination-$hauteur_source-2;

imagecopymerge($res_img_destination, $res_img_source, $position_x, $position_y, 0, 0, $largeur_source, $hauteur_source, 50);

imagepng($res_img_destination); */
?>

<?php
/* header('Content-type: image/png');
$res_image = imagecreate(80, 15);

$orange = imagecolorallocate($res_image, 255, 128, 0);
$bleu = imagecolorallocate($res_image, 0, 0, 255);
$bleuclair = imagecolorallocate($res_image, 156, 227, 254);
$noir = imagecolorallocate($res_image, 0, 0, 0);
$blanc = imagecolorallocate($res_image, 255, 255, 255);

if(date('H')>8 AND date('H')<20)
  imagestring($res_image, 1, 4, 3, 'TTB :: Powered', $blanc);
else
  imagestring($res_image, 1, 4, 3, 'TTB :: Powered', $noir); */
/* imagecolortransparent($res_image, $orange); //Pour rendre la couleur d'une image transparente */
  
/* imagepng($res_image); */
?>

<?php
/* header("Content-type: image/png");
$image = imagecreatefrompng('images/badges/php-power-micro.png');
imagepng($image); */
?>
<?php
/**
* Classe ImageTools
*
* Manipulation d'images
* @author siddh
* @version 1.0
* @package Utils
*/
class ImageTools
{
  const X = 0;
  const Y = 1;
  const TOP = 2;
  const BOTTOM = 3;
  const LEFT = 4;
  const RIGHT = 5;
  const CENTER = 6;
  const MIDDLE = 7;
      
   /**#@+
   * @access private
   * @var php_image_resource
   */
   private $img;
   private $dstImg;
   /**#@-*/
   
   /**#@+
   * @access private
   * @var int
   */
   private $srcWidth;
   private $srcHeight;
   /**#@-*/
   
   /**#@+
   * @access private
   * @var string
   */
   private $file;
   private $ext;
   private $srcPath;
   private $dstPath;
   private $font;
   /**#@-*/
   
   /**#@+
   * @access private
   * @var array
   */
   private $textColor;
   private $bgColor;
   private $old;
   /**#@-*/
   
   /**
   * Constructeur
   */
   public function __construct() {
     $this->textColor    = array("r" => 0, "g" => 0, "b" => 0);
	 $this->bgColor       = array("r" => 255, "g" => 255, "b" => 255);
	 // A vous de mettre un chemin vers la police que vous voulez utiliser
	 $this->font       = $GLOBALS["SystemRoot"]."/include/font/VERDANA.TTF";
   }
   
   /**
   * Charge une image en mémoire afin de pouvoir la manipuler
   * Récupère la couleur du premier pixel et l'affecte à $bgColor
   * @param String Le chemin de l'image
   */
   public function loadImage($img)
   {
     if (file_exists($img))
	 {
	   $tab = pathinfo($img);
	   $this->srcPath = $tab["dirname"];
	   $this->file = $tab["basename"];
	   $this->ext = strtolower($tab["extension"]);
	   
	   if ($this->ext == "jpg")
	     $this->img = imagecreatefromjpeg($img);
	   if ($this->ext == "png")
         $this->img = imagecreatefrompng($img);
       if ($this->ext == "gif")
         $this->img = imagecreatefromgif($img);

       $this->setBgColorWithFirstPixel();
         
       $srcSize           = getImageSize($img);
       $this->srcWidth      = $srcSize[0];
       $this->srcHeight   = $srcSize[1];
	 }
   }
   
   /**
   * Récupère la couleur du premier pixel et l'affecte à $bgColor
   */
   private function setBgColorWithFirstPixel()
   {
      $rgb = imagecolorat($this->img,0,0);
         
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;
         
      $this->setBgColor($r,$g,$b);   
   }
   
   /**
   * Retaille une image
   * Méthode à arguments variables
   * Si un seul argument :
   * - l'argument est le ratio qui peut être :
   *    - un pourcentage en chaine de caractères : "50%"
   *    - une valeur comme 1.5 (150%) ou 0.5 (50%)
   * Si deux arguments :
   * - le premier est la largeur
   * - le deuxième est la hauteur
   * - dans ce cas, le meilleur ratio est calculé pour ne pas déformer l'image
   * Pour récupérer l'image transformée, il faut faire un saveAs
   * @see saveAs()
   */
   public function resizeTo()
   {
      $ratio         = -1;
      $dest_width      = 0;
      $dest_height   = 0;
      $numArgs       = func_num_args();
      if($numArgs == 1)
      {
         $ratio          = func_get_arg(0);
         $perc         = strrpos($ratio,"%");
         if($perc)
            $ratio = substr($ratio,0,$perc)/100;
         $dest_width      = $this->srcWidth*$ratio;
         $dest_height   = $this->srcHeight*$ratio;
      }
      elseif ($numArgs == 2)
      {
         $dest_width    = func_get_arg(0);
         $dest_height    = func_get_arg(1);
      }
      else
         return;

      $this->resize($dest_width,$dest_height);
   }
   
   /**
   * Retaille une image avec une nouvelle largeur
   * L'image n'est pas déformée car la hauteur est recalculée
   * Pour récupérer l'image transformée, il faut faire un saveAs
   * @param int La nouvelle largeur
   * @see saveAs()
   */
   public function resizeByWidth($width)
   {
      $this->resizeTo($width/$this->srcWidth);
   }
   
   /**
   * Retaille une image avec une nouvelle hauteur
   * L'image n'est pas déformée car la largeur est recalculée
   * Pour récupérer l'image transformée, il faut faire un saveAs
   * @param int La nouvelle hauteur
   * @see saveAs()
   */
   public function resizeByHeight($height)
   {
     $this->resizeTo($height/$this->srcHeight);     
   }
   
   /**
   * Retaille une image
   * L'image n'est pas déformée car le meilleur ratio est calculé
   * @param int La nouvelle largeur
   * @param int La nouvelle hauteur
   */
   private function resize($maxWidth, $maxHeight)
   {
       $srcRatio  = $this->srcWidth/$this->srcHeight;
       $destRatio = $maxWidth/$maxHeight;
       
       if ($destRatio > $srcRatio)
       {
           $destSize[1] = $maxHeight;
           $destSize[0] = $maxHeight*$srcRatio;
       }
       else
       {
           $destSize[0] = $maxWidth;
           $destSize[1] = $maxWidth/$srcRatio;
       }
	   
       $this->dstImg = imagecreatetruecolor($destSize[0],$destSize[1]);
	   if (function_exists('imageAntiAlias'))
	   {
	     echo 'imageAntiAlias existe<br/>';
	     imageAntiAlias($this->dstImg,true);
	   }
	   else
	     echo 'imageAntiAlias n\'existe pas<br/>';
	   
       
       $color = imagecolorallocate($this->dstImg, $this->bgColor["r"],$this->bgColor["g"], $this->bgColor["b"]);
       
       
       imagefill($this->dstImg,0,0,$color);
	/* imageCopyResized($this->dstImg, $this->img, 0, 0, 0, 0,$destSize[0],$destSize[1],$this->srcWidth,$this->srcHeight);  */
	imageCopyResampled($this->dstImg, $this->img, 0, 0, 0, 0,$destSize[0],$destSize[1],$this->srcWidth,$this->srcHeight);
	   
       $this->img          = $this->dstImg;
       $this->srcWidth      = $destSize[0];
       $this->srcHeight      = $destSize[1];
   }
   
   /**
   * Ajoute du texte à une image
   * Le texte peut être ajouté à 9 endroits :
   * - en haut à gauche
   * - en haut au milieu
   * - en haut à droite
   * - au milieu à gauche
   * - au milieu au milieu
   * - au milieu à droite
   * - en bas à gauche
   * - en bas au milieu
   * - en bas à droite
   * Par défaut, si on ne passe que le texte en argument,
   * la taille de la police sera 8,
   * la position en bas au milieu,
   * Les valeurs à passer pour la position horizontale et verticale sont des constantes
   * @param String Le texte à ajouter
   * @param int La taille de la police, par défaut 8
   * @param int Une constante pour la position verticale (TOP,BOTTOM,CENTER), par défaut BOTTOM
   * @param int Une constante pour la position horizontale (LEFT,RIGHT, CENTER), par défaut CENTER
   */
   public function addTexte($texte, $fontSize=8, $vPos=BOTTOM, $hPos=CENTER)
   {
      $basefont       = $fontSize;
      $margin         = 5;
      $bottomMargin   = round($fontSize/6) -1;   
      $description    = $texte;
        $box         = imageTTFBBox ( $basefont, 0, $this->font, $description);   
        
        $boxWidth       = $box[2] - $box[0] + $margin*2;
      $boxHeight       = $box[1] - $box[7] + $margin*2;
      
      $width = 0;
      $height = 0;
      
      if($boxWidth <= $this->srcWidth)
         $width = $this->srcWidth;
      else
         $width = $boxWidth;
         
      if($boxHeight <= $this->srcHeight)
         $height = $this->srcHeight;
      else
         $height = $boxHeight + $bottomMargin;
         
      $tabX = array();
      $tabY = array();
      
      $tabX[LEFT]      = $margin;
      $tabX[CENTER]    = ($width - $boxWidth) / 2 + $margin;
      $tabX[RIGHT]    = $width - $boxWidth + $margin;
      
      $tabY[TOP]       = $boxHeight - $margin;
      $tabY[CENTER]    = ($height + $boxHeight) / 2 +$margin;
      $tabY[BOTTOM]    = $height - $margin - $bottomMargin;
            
      $this->dstImg = imagecreatetruecolor($width,$height);
          imageAntiAlias($this->dstImg,true);
          
          $color = imagecolorallocate($this->dstImg, $this->bgColor["r"],
   $this->bgColor["g"], $this->bgColor["b"]);
          imagefill($this->dstImg,0,0,$color);
                    
          $acolor = imagecolorallocate($this->img, $this->bgColor["r"],
   $this->bgColor["g"], $this->bgColor["b"]);
          imagefill($this->img,0,0,$acolor);
      
          $imgX = ($width - $this->srcWidth) / 2;
          $imgY = ($height - $this->srcHeight) / 2;
                    
      imagecopy($this->dstImg, $this->img, $imgX,$imgY, 0,0, $this->srcWidth, $this->srcHeight);
                
         $textColor = imagecolorallocate($this->dstImg, $this->textColor["r"], 
 $this->textColor["g"], $this->textColor["b"]);
          imagettftext($this->dstImg, $fontSize, 0, $tabX[$hPos], $tabY[$vPos], 
  $textColor, $this->font, $description);   
      
          $this->img          = $this->dstImg;
          $this->srcWidth      = $boxWidth;
          $this->srcHeight   = $boxHeight;
            
   }
   
   /**
   * Enregistre l'image sur le disque en png
   * @param String Le chemin de l'image sans l'extension
   * @todo Prevoir que l'utilisateur fournisse une extension
   */
   public function saveAs($name)
   {
      imagepng($this->img,$name.".png");
   }
   
   /**
   * Retourne la couleur du texte
   * Tableau associatif avec les clés "r", "g" et "b"
   * @return array un tableau contenant les valeurs rgb de la couleur du texte
   */
   public function getTextColor()
   {
      return $this->textColor;   
   }
   
   /**
   * Affecte la couleur du texte
   * @param int Paramètre r de rgb
   * @param int Paramètre g de rgb
   * @param int Paramètre b de rgb
   */
   public function setTextColor($r,$g,$b)
   {
      $this->textColor["r"] = $r;   
      $this->textColor["g"] = $g;
      $this->textColor["b"] = $b;
   }
   
   /**
   * Affecte la couleur du fond
   * @param int Paramètre r de rgb
   * @param int Paramètre g de rgb
   * @param int Paramètre b de rgb
   */
   public function setBgColor($r,$g,$b)
   {
      $this->old["r"] = $this->bgColor["r"];   
      $this->old["g"] = $this->bgColor["g"];
      $this->old["b"] = $this->bgColor["b"];
      $this->bgColor["r"] = $r;   
      $this->bgColor["g"] = $g;
      $this->bgColor["b"] = $b;
   }
   
}
?>
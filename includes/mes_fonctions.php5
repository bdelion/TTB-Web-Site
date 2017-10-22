<?php
//recupere l'adresse ip du PC de l'utilisateur
  function get_ip() { 
    if(isset($_SERVER)) {
	  if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	  elseif(isset($_SERVER['HTTP_CLIENT_IP']))
	    $ip = $_SERVER['HTTP_CLIENT_IP'];
	  else
	    $ip = $_SERVER['REMOTE_ADDR'];
    }
	else {
	  if(getenv('HTTP_X_FORWARDED_FOR'))
	    $ip = getenv('HTTP_X_FORWARDED_FOR');
	  elseif(getenv('HTTP_CLIENT_IP'))
	    $ip = getenv('HTTP_CLIENT_IP');
	  else
	    $ip = getenv('REMOTE_ADDR');
	}
	return $ip;
  }

//crypte l'adresse email passée en paramètre
  function spam($chaine) {

  $ret_chaine='';
  $lg = strlen($chaine);

  for ($x = 0; $x < $lg; $x++) {
    $ord = ord(substr($chaine, $x, 1));
    $ret_chaine .= "&#$ord;";
   }

   echo $ret_chaine;
  }

//pour le calcul du temps de génération de la page
  function getmicrotime(){
    list($usec, $sec) = explode(' ', microtime());
    return((float)$usec + (float)$sec);
  }
?>
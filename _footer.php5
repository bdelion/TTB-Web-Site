<?php
  // Testé avec PHP 4.3.3 POUR PAGERANK
  Function xtTraiter($nompage) {
    $nompage = strtolower($nompage);
	$nompage = strtr($nompage,"àâäáîïíôöóùûüéèêëçñ","aaaaiiiooouuueeeecn");
	$nompage = eregi_replace("[^a-z0-9_:~\\\/\-]","_",$nompage);
	return($nompage);
  }
?>
<!-- Pied de page -->
      <div id="footer">
	    <p>
		  Cliquez <a href="#global">ici</a> pour remonter | 
		  <a href="http://validator.w3.org/check?uri=referer" title="Valid xhtml 1.0 Strict"><img src="images/badges/valid_xhtml10_80x15_2.png" alt="Valid xhtml 1.0 Strict" title="Valid xhtml 1.0 Strict" width="80" height="15"/></a> | 
		  <?php
		    echo '<a href="http://jigsaw.w3.org/css-validator/validator?uri=http://bertrand.delion.free.fr/TTB/v0.2/index.php?page='.$page.'" title="Valide css"><img src="images/badges/valid_css_80x15_2.png" alt="Valide css" title="Valide css" width="80" height="15"/></a>'
          ?> | 
		  <a href="http://www.mozilla-europe.org/fr/" title="Get Firefox - The Browser, Reloaded."><img src="images/badges/get_firefox_80x15.png" alt="Get Firefox" title="Get Firefox - The Browser, Reloaded." width="80" height="15"/></a> | 
		  <img src="images/badges/made_france_80x15.png" alt="Made in France" title="Made in France" width="80" height="15"/> | 
		  <a href="http://www.php.net" title="Powered by PHP"><img src="images/badges/get_php_80x15.png" alt="Powered by PHP" title="Powered by PHP" width="80" height="15"/></a> | 
		  <a href="http://www.mysql.com" title="Powered by MySQL"><img src="images/badges/get_mysql_80x15.png" alt="Powered by MySQL" title="Powered by MySQL" width="80" height="15"/></a>
		</p>
		<p>
<!-- Start Free-PageRank.com -->
		  <script type="text/javascript">_FPR=0;</script>
		  <script type="text/javascript" src="http://www.free-pagerank.com/js/free-pagerank.js"></script>
		  <script type="text/javascript">if(_FPR==1){freepr("http://ttbeaupreau.free.fr","2");}</script>
		  <object>
		    <noscript>
		      <p>
			    <a href="http://www.free-pagerank.com">Free PageRank logo for your site</a>
			  </p>
		    </noscript>
		  </object>
<!-- End Free-PageRank.com --> | 
<!-- Start Xiti -->
		  <a href="http://www.xiti.com/xiti.asp?s=311888" title="WebAnalytics">
		    <script type="text/javascript">
		      <!--
			  Xt_param = 's=311888&p=<?php echo xtTraiter($menu_left[($page*2)]) ?>';
			  try {Xt_r = top.document.referrer;}
			  catch(e) {Xt_r = document.referrer;}
			  Xt_h = new Date();
			  Xt_i = '<img width="39" height="25" border="0" alt="" ';
			  Xt_i += 'src="http://logv16.xiti.com/hit.xiti?'+Xt_param;
			  Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
			  if(parseFloat(navigator.appVersion)>=4) {
			    Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;
			  }
			  document.write(Xt_i+'&ref='+Xt_r.replace(/[<>"]/g, '').replace(/&/g, '$')+'" title="Internet Audience">');
			  //-->
		    </script>
			<object>
			  <noscript>
		        <p>Mesure d'audience ROI statistique webanalytics par <img width="39" height="25" src="http://logv16.xiti.com/hit.xiti?s=311888&amp;p=<?php echo xtTraiter($menu_left[($page*2)]) ?>" alt="WebAnalytics" /></p>
		      </noscript>
			</object>
		  </a>
<!-- End Xiti -->
		</p>
		<p><img src="images/exectime.png" alt=""/> 
		<?php
		  $end_time = getmicrotime();
		  echo 'Page générée en '.round($end_time-$start_time, 3).' s';
		?> | 
		<img src="images/connectes.png" alt=""/> 
		<?php
		$connection = mysql_connect('localhost', 'root', '396549');
		if ($connection)
		{
		  $db_selected = mysql_select_db('test', $connection);
		  if ($db_selected)
		  {
/* On enregistre le timestamp de l'adresse IP */
	        $query = "SELECT COUNT(*) AS nbre_entrees FROM connectes";
			$reponse = mysql_query($query);
			if (!$reponse)
			  echo 'Invalid query : ' . mysql_error().' - '.$reponse.'<br/>';
			$donnees = mysql_fetch_array($reponse);
			if ($donnees['nbre_entrees'] == 1)
			  echo '1 visiteur connecté';
			else
			  echo $donnees['nbre_entrees'].' visiteurs connectés';
			$res_fichier = fopen('admin/record_connectes.txt', 'r+');
			$record_connectes = fgets($res_fichier);
			$record_timestamp = fgets($res_fichier);
			if($record_connectes < $donnees['nbre_entrees'])
			{
			  fseek($res_fichier, 0);
			  $record_connectes = $donnees['nbre_entrees'];
			  $record_timestamp = time();
			  fputs($res_fichier, $record_connectes);
			  fputs($res_fichier, "\n");
			  fputs($res_fichier, $record_timestamp);
			}
			fclose($res_fichier);
		  }
		  else
		    echo 'Can\'t use db : ' . mysql_error().' - '.$db_selected.'<br/>';
		  mysql_close();
		}
		else
		  echo'Not connected : ' . mysql_error().' - '.$connection.'<br/>';
		if ($record_connectes == 1)
		  echo ' (Record : 1 visiteur connecté le ';
		else
		  echo ' (Record : '.$record_connectes.' visiteurs connectés le ';
		echo date('d/m/Y à H:i:s', $record_timestamp).')';
		?>
		| 
		<img src="images/communaute.png" alt=""/> xx visiteurs depuis l'ouverture du site | 
		<img src="images/adresse_ip.png" alt=""/>
		<?php
		  echo get_ip();
		?></p>
		<p>Tous droits réservés. Copyright &copy; Tennis de Table Beaupréau 2007 | Code &amp; design par <a href='mailto:<?php spam('bertrand.delion@free.fr'); ?>'>fifiz</a> | Contenu par <a href='mailto:<?php spam('notubalex@hotmail.fr'); ?>'>notub.alex</a></p>
      </div>
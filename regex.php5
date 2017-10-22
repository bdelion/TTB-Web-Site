<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2><?php echo $menu_left[($page*2)]; ?></h2>
		  <h3>preg_match</h3>
		  <p>guitare => J'aime jouer de la guitare</p>
          <?php
		  if(preg_match('!guitare!', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>piano => J'aime jouer de la guitare</p>
          <?php
		  if(preg_match('!piano!', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>Guitare => J'aime jouer de la guitare</p>
          <?php
		  if(preg_match('!Guitare!', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>GUITARE => J'aime jouer de la guitare</p>
          <?php
		  if(preg_match('!GUITARE!', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>Guitare => J'aime jouer de la guitare OPTION i</p>
          <?php
		  if(preg_match('!Guitare!i', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>GUITARE => J'aime jouer de la guitare OPTION i</p>
          <?php
		  if(preg_match('!GUITARE!i', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>guitare | piano => J'aime jouer de la guitare</p>
          <?php
		  if(preg_match('!guitare|piano!', 'J\'aime jouer de la guitare.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>guitare | piano => J'aime jouer de la piano</p>
          <?php
		  if(preg_match('!guitare|piano!', 'J\'aime jouer du piano.'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>commence par Bonjour => Bonjour petit zéro</p>
          <?php
		  if(preg_match('!^Bonjour!', 'Bonjour petit zéro'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>se termine par zéro => Bonjour petit zéro</p>
          <?php
		  if(preg_match('!zéro$!', 'Bonjour petit zéro'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>commence par zéro => Bonjour petit zéro</p>
          <?php
		  if(preg_match('!^zéro!', 'Bonjour petit zéro'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <p>se termine par zéro => Bonjour petit zéro !!!</p>
          <?php
		  if(preg_match('!zéro$!', 'Bonjour petit zéro !!!'))
		    echo 'VRAI';
		  else
		    echo 'FAUX';
		  ?>
		  <h3>preg_replace</h3>
		  <?php
		  echo preg_replace('!\[b\](.+)\[/b\]!isU', '<strong>$1</strong>', 'Hello, [b]Bonjour[/b], comment allez-vous ? [b]Je[/b] suis très content de [b]vous[/b] rencontrer').'<br/>';
		  echo preg_replace('!\[i\](.+)\[/i\]!isU', '<em>$1</em>', 'Hello, [i]Bonjour[/i], comment allez-vous ? [i]Je[/i] suis très content de [i]vous[/i] rencontrer').'<br/>';
		  echo preg_replace('!\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]!isU', '<span style="color:	$1">$2</span>', 'Hello, [color=blue]Bonjour[/color], comment allez-vous ? [color=purple]Je[/color] suis très content de [color=red]vous[/color] rencontrer').'<br/>';
		  echo preg_replace('!http://([a-z0-9._/-]+)!i', '<a href="http://$1">$1</a>', 'Hello, voici le lien du TTB http://ttbeaupreau.free.fr').'<br/>';
		  ?>
        </div>
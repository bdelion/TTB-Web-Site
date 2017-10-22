<!-- Corps -->
        <div id="content">
<!-- Modifier le titre de la page ici -->
          <h2>
		    <?php echo $menu_left[($page*2)];
			?>
		  </h2>
          <p>
		  <?php
		    $image = new ImageTools();
			$image->loadImage('photos/20052006/20060409/IMG_0384.JPG');
			$image->resizeByHeight(600);
			$image->saveAs('photos/20052006/20060409/IMG_0384');
			$image->resizeByHeight(75);
			$image->saveAs('photos/20052006/20060409/thumbs/IMG_0384');
			
			$image = new ImageTools();
			$image->loadImage('photos/20052006/20060409/IMG_0385.JPG');
			$image->resizeByHeight(600);
			$image->saveAs('photos/20052006/20060409/IMG_0385');
			$image->resizeByHeight(75);
			$image->saveAs('photos/20052006/20060409/thumbs/IMG_0385');
			
			$image = new ImageTools();
			$image->loadImage('photos/20052006/20060409/IMG_0386.JPG');
			$image->resizeByHeight(600);
			$image->saveAs('photos/20052006/20060409/IMG_0386');
			$image->resizeByHeight(75);
			$image->saveAs('photos/20052006/20060409/thumbs/IMG_0386');
		  ?>
		  </p>
        </div>
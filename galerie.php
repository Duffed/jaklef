<!DOCTYPE html>
<html>
	<head>		
		<title>Jaklef - Galerie</title>
		<?php include('include/head.html') ?>
		<link rel="stylesheet" href="css/galerie.css" type="text/css"/>
		<script type='text/javascript' src="js/jquery.nicescroll.min.js"></script>

		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

		<!-- Add fancyBox -->
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
			<!-- Optionally add helpers - button, thumbnail and/or media -->
			<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
			<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

		<link rel="stylesheet" href="css/jquery.nailthumb.1.1.min.css" type="text/css" />
		<script type='text/javascript' src="js/jquery.nailthumb.1.1.min.js"></script>

		<script type='text/javascript' src="js/js_galerie.js"></script>
	</head>
<body>
	<?php include('include/header.html') ?>
	<section id="wrapper">
	<?php include('include/navigation.html') ?>
<!---->		
	<?php
		if (!isset($_GET["album"]) or $_GET["album"] == 0 ) {

			echo"<div class='bg_transparent gallery_cover' id='gallery_left'>";
				//include line 1 of textX.html
				$file = file("galerie/text1.html");
				echo "<div class='displaynonenotmobile'>".$file[0]."</div>";

				echo"<a href='" . $_SERVER['PHP_SELF'] . "?album=1'><img class='grayscale' src='galerie/cover-1.jpg'></a>
			</div>

			<div class='bg_transparent gallery_cover' id='gallery_right'>";
				 include('galerie/text1.html'); 
			echo"</div>";

				$directory = "galerie/";	//where the gallery images are located				
				$allowed_types=array('jpg','jpeg','gif','png');	//allowed image types
				$file_parts=array();
				$ext='';

				$images = glob($directory."{*.jpg,*.JPG,*.jpeg, *.JPEG}", GLOB_BRACE);
				$i = count($images);

				//try to open the directory
				$dir_handle = @opendir($directory) or die("There is an error with your image directory!");
				while ($file = readdir($dir_handle))	//traverse through the files
				{
					if($file=='.' || $file == '..') continue;	//skip links to the current and parent directories

					$file_parts = explode('.',$file);	//split the file name and put each part in an array
					$ext = strtolower(array_pop($file_parts));	//the last element is the extension

					if(in_array($ext,$allowed_types))	//if the extension is an allowable type
					{
						if ($i > 1) {
							echo"<div class='bg_transparent gallery_cover' id='gallery_left'>";
								//include line 1 of textX.html
								$file = file("galerie/text".$i.".html");
								echo "<div class='displaynonenotmobile'>".$file[0]."</div>";

								echo"<a href='" . $_SERVER['PHP_SELF'] . "?album=".$i."'><img class='grayscale' src='galerie/cover-".$i.".jpg'></a>
							</div>
							
							<div class='bg_transparent gallery_cover' id='gallery_right'>";
								include("galerie/text".$i.".html");
							echo"</div>";
						}
						$i--;	//increment the image counter
					}
				}
			
		} else {
			echo "<div class='bg_transparent content_general'><a href='" . $_SERVER['PHP_SELF'] . "'>
				<em class='highlight'>&lt; </em>Zur&uuml;ck</a></div>";
			echo "<div class='bg_transparent content_general' >";			
				$directory = "galerie/$_GET[album]";	//where the gallery images are located
				$number = $_GET["album"];
				
				//include line 1 of textX.html
				$file = file("galerie/text".$number.".html");
				echo $file[0];
				
				$allowed_types=array('jpg','jpeg','gif','png');	//allowed image types

				$file_parts=array();
				$ext='';
				$title='';
				$i=0;

				echo "<ul id='gallery_list'>";
				//try to open the directory
				$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

				while ($file = readdir($dir_handle))	//traverse through the files
				{
					if($file=='.' || $file == '..') continue;	//skip links to the current and parent directories

					$file_parts = explode('.',$file);	//split the file name and put each part in an array
					$ext = strtolower(array_pop($file_parts));	//the last element is the extension

					$title = implode('.',$file_parts);	//once the extension has been popped out, all that is left is the file name
					$title = htmlspecialchars($title);	//make the filename html-safe to prevent potential security issues

					$nomargin='';
					if(in_array($ext,$allowed_types))	//if the extension is an allowable type
					{
						//if(($i+1)%4==0) $nomargin='nomargin';	//the last image on the row is assigned the CSS class "nomargin"
						echo '
						<li class="gallery_list_item"><a class="fancybox" rel="gallery'.$directory.'" href="'.$directory.'/'.$file.'">
						<img class="grayscale" src="'.$directory.'/'.$file.'"></a></li>';

						$i++;	//increment the image counter
					}
				}

				closedir($dir_handle);	//close the directory
			echo "</ul></div>";
		}
	?>
<!---->		
	<?php include('include/impressum.html') ?>
	</section>
</body>
</html>

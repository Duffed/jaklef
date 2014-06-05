<!doctype html>
<html>
	<head>		
		<title>Jaklef.de</title>
		<?php include('include/head.html') ?>

		<script type='text/javascript' src="js/lazyYT.min.js"></script>
		<script type='text/javascript' src="js/jqinstapics.min.js"></script>
		<script type='text/javascript' src="js/FeedEk.min.js"></script>
		<script type='text/javascript' src="js/jquery.nicescroll.min.js"></script>
		
		<!-- Add fancyBox -->
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
			<!-- Optionally add helpers - button, thumbnail and/or media -->
			<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
			<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
			<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

		<script type='text/javascript' src="js/js_index.js"></script>
	</head>
<body>
<?php include('include/header.html') ?>
	<section id="wrapper">
<?php include('include/navigation.html') ?>
<!---->

			<!-- Album cover -->
			<div class="bg_transparent content_general">
				<h2 class="headline ">Album vorbestellen!</h2>
				<img class="albumcover" src="galerie/10/pure_gewalt_2.jpg">
			</div>
			
			<!-- Top left content -->
			<div class="bg_transparent" id="content_top_left">
				<h2 class="headline headline_2">Youtube</h2>
				<?php
					error_reporting( 0 );
					include( 'admin/funktionen.inc.php' );
					$conid = db_connect();
					
					$ausgabe = mysql_query("select * from youtube");
					while($row = mysql_fetch_object($ausgabe))
					{
						echo "<div class='js-lazyYT border' data-youtube-id='$row->link' data-width='477' data-height='250'></div>";
					}
				?>	
			</div>
			
			<!-- top right content -->
			<div class="bg_transparent" id="content_top_right">
				<h2 class="headline headline_2">Facebook</h2>
				<div id="content_top_right_act">
					<div id="divRss"></div>
				</div>
			</div>
			
			<!-- bottom content -->
			<div class="bg_transparent" id="content_bottom">
				<h2 class="headline headline_2">Instagram</h2>
				<ul id="instagram"></ul>
			</div>
			
			<!-- Tracks -->
			<div class="bg_transparent content_general">
				<h2 class="headline">Soundcloud</h2>
				<ul id="content_tracks">
					<?php					
						$ausgabe = mysql_query("select * from soundcloud order by ID");
						while($row = mysql_fetch_object($ausgabe))
						{
							$sc_neu = "";
							if ($row->neu == "1") { $sc_neu = "<em class='highlight'>Neu </em>"; }
							echo "<li><a href='$row->link' class='stratus'>$sc_neu $row->text</a></li>
							";
						}
					?>
				</ul>
			</div>
<!---->		
<?php include('include/impressum.html') ?>
	</section>
</body>
</html>

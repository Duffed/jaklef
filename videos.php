<!DOCTYPE html>
<html>
	<head>		
		<title>Jaklef - Videos</title>
		<?php include('include/head.html') ?>

        <link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/videoGallery_playlist_h_bottom.css" />
        <!--[if lte IE 8 ]><link rel="stylesheet" type="text/css" href="css/ie_below_9.css" /><![endif]-->
        
        <script type="text/javascript" src="js/swfobject.js"></script>
        <script type="text/javascript" src="js/jquery.dotdotdot-1.5.1.js"></script>
        <script type="text/javascript" src="js/jquery.address.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="js/froogaloop.js"></script>
        <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
        <script type="text/javascript" src="js/jquery.apPlaylistManager.min.js"></script>
        <script type="text/javascript" src="js/jquery.apYoutubePlayer.min.js"></script>
        <script type="text/javascript" src="js/jquery.apVimeoPlayer.min.js"></script>
        <script type="text/javascript" src="js/jquery.func.js"></script>
        <script type="text/javascript" src="js/jquery.videoGallery.min.js"></script>
		
		<script type="text/javascript" src="js/js_video.js"></script>
	</head>
<body>
<?php include('include/header.html') ?>
	<section id="wrapper">
<?php include('include/navigation.html') ?>
<!---->
	<div class='bg_transparent' id='content_general'>
		<h2 class="headline">Barake TV</h2>
    	<div id="componentWrapper">
    		<div class="componentInnerWrapper">
                <div class="playerHolder">                     
                    <div class="youtubeHolder"></div>	
                </div>
                <div class="playlistHolder">
                    <div class="componentPlaylist">
                        <div class="playlist_inner">
                            <!-- LIST OF PLAYLISTS -->
							<ul id='youtube_playlist'>
    							<!-- ID of the user -->
    							<li data-type='youtube_user_uploads' data-path="http://gdata.youtube.com/feeds/api/users/BarakeTV/uploads?start-index=1&max-results=50&v=2&format=5&alt=jsonc" ></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
	</div>
<!---->		
<?php include('include/impressum.html') ?>
	</section>
</body>
</html>

			// FLASH EMBED PART
			var flashvars = {};
			var params = {};
			var attributes = {};
			attributes.id = "flashPreview";
			params.quality = "high";
			params.scale = "noscale";
			params.salign = "tl";
			params.wmode = "transparent";
			params.bgcolor = "#111";
			params.devicefont = "false";
			params.allowfullscreen = "true";
			params.allowscriptaccess = "always";
			swfobject.embedSWF("preview.swf", "flashPreview", "100%", "100%", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
			
			//functions called from flash
			var jsReady = false;//for flash/js communication
			function flashVideoEnd() {jQuery.fn.videoGallery.flashVideoEnd();}
			function flashVideoStart() {jQuery.fn.videoGallery.flashVideoStart();}
			function dataUpdateFlash(bl,bt,t,d) {jQuery.fn.videoGallery.dataUpdateFlash(bl,bt,t,d);}
			function flashVideoPause() {jQuery.fn.videoGallery.flashVideoPause();}
			function flashVideoResume() {jQuery.fn.videoGallery.flashVideoResume();}
			function flashMainPreviewOff() {jQuery.fn.videoGallery.flashMainPreviewOff();}
			function flashResizeControls() {jQuery.fn.videoGallery.flashResizeControls();}
			function isReady() {return jsReady;}
			
			jQuery(document).ready(function($) {
				//active Link
				$("#link_videos").addClass("navigation_active");
			
				jsReady = true;
			    //init component
			    $('#componentWrapper').videoGallery({	
					
					/* REQUIRED */
					
					/* DEEPLINKING SETTINGS */
				    /* useDeeplink: true, false */
					useDeeplink:false,
					/* startUrl: deeplink start url, enter 'ul' data-address/'li' data-address (two levels). Or just 'ul' data-address (single level). */
					startUrl: 'mix1/local1',
					
					/* NO DEEPLINKING SETTINGS */
					/*activePlaylist: enter element 'id' attributte */
					activePlaylist:'youtube_playlist',
					/*activeItem: video number to start with (-1 = none, 0 = first, 1 = second, 2 = third ...etc) */
					activeItem:0,
					
					/* GENERAL */
					/*thumbOrientation: horizontal, vertical (for scrolling) */
					thumbOrientation: 'horizontal',
					/*playlistPosition: bottom / right */
					playlistPosition: 'bottom',
					/*fullSize: true/false (dont forget to edit the css as well) */
					fullSize: false,
					/*flashHolder: id of the flash movie */
					flashHolder:'#flashPreview',
					
					/* DEFAULTS */
					
					/*defaultVolume: 0-1 */
					defaultVolume:0.5,
					/*autoPlay: true/false */
					autoPlay:true,
					/* loopingOn: loop playlist on end (last item in playlist), true/false */
					loopingOn:true,
					/* randomPlay: random play in playlist, true/false */
					randomPlay:false,
					/*autoAdvanceToNextVideo: true/false */
					autoAdvanceToNextVideo:true,
					/*autoMakePlaylistThumb: true/false (valid only for youtube and vimeo, auto make thumb for each video) */
					autoMakePlaylistThumb:true,
					/*autoMakePlaylistInfo: true/false (valid only for youtube and vimeo, auto make title and description for each video) */
					autoMakePlaylistInfo:true,
					/* outputPlaylistData: console.log out playlist data */
					outputPlaylistData:false,
					/* useYoutubeHighestQuality: true/false (use highest available quality for youtube video, if false, then it set to default)  */
					useYoutubeHighestQuality:false,
					
					videoGallerySetupDone:function() {
						//console.log('videoGallerySetupDone');
					}
				});		
    	    });
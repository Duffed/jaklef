$(document).ready(function(){
	//active Link
	$("#link_index").addClass("navigation_active");

	//Youtube (LazyYT)
	$('.js-lazyYT').lazyYT();

	//Instagram (jqinstapics)
	$("#instagram").jqinstapics({
	  "user_id": "517319564",
	  "access_token": "517319564.674061d.b0329fcda64c4720a4aa897a6e07ef52",
	  "count": 8
	});
	
	//Facebook (Feedek)
	$('#divRss').FeedEk({
		FeedUrl: 'https://www.facebook.com/feeds/page.php?id=524317287603587&format=rss20',
		ShowDesc: false,
		MaxCount: 10,
	});
		
	//scrollbar (nicescroll)
	$('#content_top_right_act').niceScroll({
		cursorborder: "0px solid black",
		cursorwidth: "2px",
		cursorcolor: "#777",
		cursorborderradius: "0px",
	});
	
	//Youtube mouseover
	$(".js-lazyYT p").hide();
	$(".js-lazyYT p").height("0px");
	$(".js-lazyYT").mouseenter(function() {
		$(".js-lazyYT p").fadeTo(5, 1);
		$(".js-lazyYT p").animate({height: "30px"}, 2);
	});
	$(".js-lazyYT").mouseleave(function() {
		$(".js-lazyYT p").fadeTo(1, 0);
		$(".js-lazyYT p").animate({height: "0px"}, 30);
	});
	
	//Instagram fancybox
	$(".fancybox_instagram").fancybox({
		margin: 80,
		openEffect : 'none', 
		closeEffect : 'none', 
		prevEffect : 'fade', 
		nextEffect : 'fade',
		padding : 2,
		helpers : {
			media : {}
		}
	});

	//Soundcloud / Stratus
	$.stratus({
		links: 'http://soundcloud.com/jaklef-waelepoel/',
		color: "000",
		buying: false,
		download: false,
		user: false,
		stats: false
	});
});


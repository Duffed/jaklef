$(document).ready(function(){
	//active Link
	$("#link_galerie").addClass("navigation_active");

	//
	$(".fancybox").fancybox({
		margin: 40,
		openEffect : 'none', 
		closeEffect : 'none', 
		prevEffect : 'fade', 
		nextEffect : 'fade',
		padding : 2
	});
	
	//scrollbar (nicescroll)
	$('.gallery_text').niceScroll({
		cursorborder: "0px solid black",
		cursorwidth: "2px",
		cursorcolor: "#777",
		cursorborderradius: "0px",
	});

	$('.gallery_list_item').nailthumb();
	
});
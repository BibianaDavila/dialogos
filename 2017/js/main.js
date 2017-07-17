$(document).ready(function(){

	/* Altura pagina */
	var docHeight = $(document).outerHeight();

	/* Largura pagina */
	var docWidth = $(document).width();

	if(docHeight>599 && docWidth>991){
		$(".main").onepage_scroll({
		   sectionContainer: "section", // sectionContainer accepts any kind of selector in case you don't want to use section
		   easing: "ease", // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in", "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
		   animationTime: 900, // AnimationTime let you define how long each section takes to animate
		   pagination: true, // You can either show or hide the pagination. Toggle true for show, false for hide.
		   updateURL: true // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
		});
	}
	
});
function init() {
    window.setTimeout(function(){
        start();
    }, 100);
}
function start() {
	$('body').removeClass("loading").addClass('loaded');
}
$(window).load(function() {
	
	init(); // fade in page
	
});
$(window).resize(function() {


});

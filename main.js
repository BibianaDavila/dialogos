$(function() {
    $('a[href*="#"]:not([href="#"])').click(function(){
        /*
            var nav = document.getElementById("sticky"),
            anchor = nav.getElementsByTagName("a"),
            current = this.hash;

            for (var i = 0; i < anchor.length; i++) {
                anchor[i].className = "menu-link";
                
                if(anchor[i].hash == current) {
                    anchor[i].className = "menu-link active";
                }
            }
        */

        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });
});

$('#main a').click( function(e) {
    
    //Remove the selected class from all of the links
    $('#main a.active').removeClass('active');

    //Add the selected class to the current link
    $(this).addClass('active');
});

$(function() {
    $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
});

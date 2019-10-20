$(document).ready(function($) {
    $(window).scroll(function() {
        var scrollPos = $(window).scrollTop();

        console.log(scrollPos);
        /*
        if (scrollPos > 700) {
            //document.getElementById('chiassoTvNavbar').style.backgroundColor = "#FC4445";
            document.getElementById("chiassoTvNavbar").style.transition = "all 0.7s";
        } else {
            document.getElementById('chiassoTvNavbar').style.backgroundColor = "transparent !important";
        }
        */
    });
});
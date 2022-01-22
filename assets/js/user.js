//
// user.js
// Use this to write your custom JS

//nav bar
$(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
        $("#navbar-Boxshadou").addClass("floatingNav");
    } else {
        $("#navbar-Boxshadou").removeClass("floatingNav");
    }
});

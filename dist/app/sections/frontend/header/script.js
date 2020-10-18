$(document).on("click", "header.header .option.account.open", function() {
    $(this).removeClass('open');
    $(".header-layer").hide();
});


$(document).on("click", "header.header .option.account:not(.open)", function() {
    $(this).addClass('open');
    $(".header-layer").show();
});

$(document).on("click", "header.header .option.account > i, .header-layer", function() {
    var optionLi = $("header.header .option");
    optionLi.removeClass('open');
    $(".header-layer").hide();
});
$(document).on("click", "header.header .option.mobileMenu", function() {
    $("header.header nav").show();
    $("header.header").addClass('menuOpen');
});
$(document).on("click", "header.header .navUserMobileClose", function() {
    $("header.header nav").hide();
    $("header.header").removeClass('menuOpen');
});

$(window).scroll(function() {
        var offset = 0;
        //alert(clPage_alias);
        if (clPage_alias == 'frontpage'){
             offset = 100;
        }

        var scroll = $(window).scrollTop();
        if (scroll > offset) {
            $("header.header").addClass("sticky");
        } else {
            $("header.header").removeClass("sticky");
        }

});

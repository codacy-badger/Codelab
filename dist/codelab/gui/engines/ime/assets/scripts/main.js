

$(document).on("click","a.layer",function(event) {
    var link = $(this).attr('href');
    event.preventDefault();
    $("#clGUILoader").fadeIn(250);
    setTimeout(function () {
        window.location.href = link;
    }, 500);
});



$(document).on("click","section.baner .panel .account .username, section.baner .panel .account .image",function(event) {
    var account = $("section.baner .panel .account");
    if (account.hasClass('open')){
        account.removeClass('open');
    } else {
        account.addClass('open');
    }
});






$(document).ready(function() {

    $("#clGUILoader").fadeOut(250);


});

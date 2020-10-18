function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

$(window).scroll(function() {

	var scroll = $(window).scrollTop();
    // Initial bottom
    var layer1Bottom = 188;
    var layer2Bottom = 308;
    var layer3Bottom = 455;
    var layer4Bottom = 650;
    // Move ratio
    var layer1ratio = 0.2;
    var layer2ratio = 0.05;
    var layer3ratio = 0.1;
    var layer4ratio = 0.5;


    var scrollRatio = scroll;
    // Values
    var layer1offset = layer1Bottom + (layer1ratio * scrollRatio);
    var layer2offset = layer2Bottom + (layer2ratio * scrollRatio);
    var layer3offset = layer3Bottom - (layer3ratio * scrollRatio);
    var layer4offset = layer4Bottom - (layer4ratio * scrollRatio);






    $(".layerParalax.layer1").css('top', layer1offset +'px');
    $(".layerParalax.layer2").css('top', layer2offset +'px');
    $(".layerParalax.layer3").css('top', layer3offset +'px');
    $(".layerParalax.layer4").css('top', layer4offset +'px');
    if (scroll > 999){

        scroll = 999;
    }



    var opacity = scroll;
        opacity = pad(opacity, 3);


    var parallaxFade = scroll;
        parallaxFade = pad(parallaxFade, 3);
        parallaxFade = 999 - parallaxFade;
        parallaxFade = pad(parallaxFade, 3);

   //$("section.baner .right .form .top .header").html("0." +parallaxFade);

    //var opacity =  scroll / 20;
   $("section.baner .layer").css('opacity', "0." +opacity);

   $(".parallaxFade").css('opacity', "0." +parallaxFade);

});




$("#loginForm").validate();
$("#joinForm").validate();

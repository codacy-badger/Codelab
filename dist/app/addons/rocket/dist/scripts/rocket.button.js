var element, circle, d, x, y;
$(".btn, .btnEffect").click(function(e){

    element = $(this);

    if(element.find(".btn-circleEffect").length == 0)
        element.prepend("<span class='btn-circleEffect'></span>");

    circle = element.find(".btn-circleEffect");
    circle.removeClass("animate");

    if(!circle.height() && !circle.width())
  {
        d = Math.max(element.outerWidth(), element.outerHeight());
        circle.css({height: d, width: d});
    }

    x = e.pageX - element.offset().left - circle.width()/2;
    y = e.pageY - element.offset().top - circle.height()/2;

    circle.css({top: y+'px', left: x+'px'}).addClass("animate");
})

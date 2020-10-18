function rocketEffect(element, type) {
    if (type === "fadeOut") {
        var element = rocketEl(element);
        var effect = setInterval(function () {
            if (!element.style.opacity) {
                element.style.opacity = 1;
            }
            if (element.style.opacity > 0) {
                element.style.opacity -= 0.1;
            } else {
                element.style.display = "none";
                clearInterval(effect);
            }
        }, 50);
    }

}
    //rocketEffect('#clLoader', 'fadeOut');

function rocketEl(element){
    var elementType = element.charAt(0);
    var elementName = element.slice(1, element.length);
    if (elementType === "."){
        // class
        return document.getElementsByClassName(elementName)[0];
    } else if (elementType === "#"){
        // id
        return document.getElementById(elementName);
    } else {
        console.log("rocketEl: Element not found '" + elementName + "'");
    }
}

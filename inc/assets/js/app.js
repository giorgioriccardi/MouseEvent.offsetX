// determine if the img is clicked on the left or on the right
// move the img accordingly
function move(event, img) {
    var posX = event.offsetX ? (event.offsetX) : event.pageX - img.offsetLeft;
    var posY = event.offsetY ? (event.offsetY) : event.pageY - img.offsetTop;
    var mid = parseInt(img.width) / 2; // determine the left/right position

    if (posX > mid) {
        moveRight(img);
    } else {
        moveLeft(img);
    }
}

function moveRight(img) {
    if (img.nextSibling == null) { /* this is the last img */

        if (img.parentNode.nextSibling == null) { /* this is the last img (because there is no next sibling?) */
            document.getElementById('0').insertBefore(img, document.getElementById('0').firstChild); /* ID 0 is the 1st DIV */
        } else if (img.parentNode.nextSibling.firstChild == null) { /* img's are created within DIV so the DIV is the parentNode; if its first child is null then it has no children? */
            img.parentNode.nextSibling.appendChild(img); /* in that case, append this img to that DIV? */
        } else {
            img.parentNode.nextSibling.insertBefore(img, img.parentNode.nextSibling.firstChild); /* first child is not null so put this IMG in <<which>> DIV?? */
        }

    } else if (img.nextSibling.nextSibling == null) {
        img.parentNode.appendChild(img);
    } else {
        img.parentNode.insertBefore(img, img.nextSibling.nextSibling);
    }
}

function moveLeft(img) {
    if (img.previousSibling == null) {
        if (img.parentNode.previousSibling == null) {
            document.getElementById('0').insertBefore(img, document.getElementById('0').firstChild);
        } else {
            img.parentNode.previousSibling.appendChild(img);
        }

    } else {
        img.parentNode.insertBefore(img, img.previousSibling);
    }
} // end of left/right click controller

window.onload = function() {

    for (var i = 0; i < 3; i++) {
        var topDiv = document.createElement("div"); /* <div id=0 style="border: thin solid grey; padding=10;"> */
        topDiv.setAttribute("id", i);
        topDiv.style.border = ('thin solid grey');
        topDiv.style.padding = ('10px');

        document.body.appendChild(topDiv);
    }

    for (var i = 0; i < 5; i++) {
        myImage = document.createElement("img"); /* <img src="0.jpg" style="width:100px" onclick="move(event,this)"; */
        myImage.setAttribute("src", i + ".jpg");
        myImage.setAttribute("style", "width: 100px");
        myImage.setAttribute("onclick", "move(event,this);")
            /* grc:
                    MouseEvent https://developer.mozilla.org/en-US/docs/Web/API/MouseEvent
                    event basically it is a short form of MouseEvent
                */

        document.getElementById('0').appendChild(myImage);
    }

}

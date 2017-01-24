:zap: MouseEvent.offsetX
======
**MouseEvent.offsetX** Plain JavaScript implemenation of MouseEvent.offsetX and MouseEvent.offsetX

```
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
```
## Version 
* Version 0.2

## Contact
#### Developer/Company
* Homepage: www.giorgioriccardi.com
* e-mail: giorgio.riccardi.ca@gmail.com
* Twitter: [@GioCreations](https://twitter.com/GioCreations "GioCreations on twitter")

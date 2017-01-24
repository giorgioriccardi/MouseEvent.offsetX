
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
<script>

// determine if the img is clicked on the left or on the right
// move the img accordingly
function move( event, img ) {
	var posX = event.offsetX ? (event.offsetX) : event.pageX-img.offsetLeft;
	var posY = event.offsetY ? (event.offsetY) : event.pageY-img.offsetTop;
	var mid = parseInt( img.width ) / 2; // determine the left/right position

	if ( posX > mid ) {
		moveRight( img );
	} else {
		moveLeft( img );
	}
}

function moveRight( img ) {
	if ( img.nextSibling == null ) { /* this is the last img */
		/*grc: 
				it is actually the first image that has nextSibling
		*/

			if ( img.parentNode.nextSibling == null ) { /*this is the last img (because there is no next sibling?)*/ /*grc: it is the first image of the Div1*/
				document.getElementById('0').insertBefore( img, document.getElementById('0').firstChild ); /* ID 0 is the 1st DIV */
			} else if ( img.parentNode.nextSibling.firstChild == null ) { /* img's are created within DIV so the DIV is the parentNode; if its first child is null then it has no children? */
			/*grc: 
					img.parentNode.nextSibling.firstChild means Div0 next = Div1, 
					so if the first image of Div 1 is not yet there appendChild (put at the very end of it) an image
			*/
				img.parentNode.nextSibling.appendChild( img ); /* in that case, append this img to that DIV? */ /*grc: see above*/
			} else {
				img.parentNode.nextSibling.insertBefore( img, img.parentNode.nextSibling.firstChild ); /* first child is not null so put this IMG in <<which>> DIV?? */
			/*grc: 
					img.parentNode.nextSibling.insertBefore... means if there is a next Div1, with already an image in it, 
					then insertBefore it another image; like this you push the shifting towards the right
			*/	
			}

	} else if ( img.nextSibling.nextSibling == null ) {
		/*grc: 
				I pushed more the indentation, this is the second case for line 24
		*/
			img.parentNode.appendChild( img );
	} else {
			img.parentNode.insertBefore( img, img.nextSibling.nextSibling );
	}
}

function moveLeft( img ) {
	if ( img.previousSibling == null ) {
		if ( img.parentNode.previousSibling == null ) {
			document.getElementById('0').insertBefore( img, document.getElementById('0').firstChild );
		} else {
			img.parentNode.previousSibling.appendChild( img );
		}

	} else {
			img.parentNode.insertBefore( img, img.previousSibling );
	}
} // end of left/right click controller

window.onload=function() {

	for ( var i = 0; i < 3; i++ ) {
		var topDiv = document.createElement( "div" ); /* <div id=0 style="border: thin solid grey; padding=10;"> */
		topDiv.setAttribute( "id", i );
		topDiv.style.border=('thin solid grey');
		topDiv.style.padding=('10px');

		document.body.appendChild( topDiv );
	}

	for ( var i = 0; i < 5; i++ ) {
		myImage = document.createElement( "img" ); /* <img src="0.jpg" style="width:100px" onclick="move(event,this)"; */
		myImage.setAttribute( "src", i + ".jpg" );
		myImage.setAttribute( "style", "width: 100px" );
		myImage.setAttribute( "onclick","move(event,this);" )
		/* grc:
			MouseEvent https://developer.mozilla.org/en-US/docs/Web/API/MouseEvent
			event basically it is a short form of MouseEvent
		*/

		document.getElementById('0').appendChild( myImage );
	}

}


</script>
	</head>

<body>
</body>

</html>

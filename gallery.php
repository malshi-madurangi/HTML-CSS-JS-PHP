<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<style>
.slideshowContainer {
  position: relative;
  overflow: hidden;
  margin: 0;
  width: 100%;   /*to fit to width 100% and remove .sliderRow->display:flex*/
  height: 400px;
}

.imageSlides {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  min-width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1s ease-in-out;
  z-index: -1;
}

.imageSlides img {
  object-fit: cover;
}

.visible {
  opacity: 1;
}

.slideshowArrow {
  font-size: 7em;
  color: rgba(255, 255, 255, 0.5);
  cursor: pointer;
  transition: opacity 0.2s ease-in-out;
}

.slideshowArrow:hover {
  opacity: 0.75;
}

#leftArrow {
  position: absolute;
  left: 4%;
  top: 50%;
  transform: translate(-50%, -50%);
}

#rightArrow {
  position: absolute;
  right: 4%;
  top: 50%;
  transform: translate(50%, -50%);
}

.slideshowCircles {
  position: absolute;
  bottom: 2%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.circle {
  display: inline-block;
  margin-left: 3px;
  margin-right: 3px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  border: solid 2px rgba(255, 255, 255, 0.5);
  transition: 1s ease-in-out;
}

.dot {
  background-color: rgba(255, 255, 255, 0.7);
  border: solid 2px rgba(255, 255, 255, 0.5);
}

</style>
<body>
	<div class="containerheader">
		<div class="slideshowContainer">
			<img class="imageSlides" src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=673&q=80" alt="beach side city view">
            <img class="imageSlides" src="https://images.unsplash.com/photo-1501876725168-00c445821c9e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="leaf on the ground">
            <img class="imageSlides" src="https://cdn.shopify.com/s/files/1/0264/6972/8316/files/bg-2.jpg?v=1566547839" alt="lake surrounded by mountains">
            <span id ="leftArrow" class="slideshowArrow">&#8249;</span>
			<span id ="rightArrow" class="slideshowArrow">&#8250;</span>
		  
			<div class="slideshowCircles">
			    <span class="circle dot"></span>
			    <span class="circle"></span>
			    <span class="circle"></span>
  			</div>
  
		</div>
	</div>

<script type="text/javascript">
	window.addEventListener("scroll",function () {
		const navbar= document.querySelector(".nav");
		// console.log(navbar);
		navbar.classList.toggle("sticky", window.scrollY>0);
	})

	// IMAGE SLIDES & CIRCLES ARRAYS, & COUNTER
	var imageSlides = document.getElementsByClassName('imageSlides');
	var circles = document.getElementsByClassName('circle');
	var leftArrow = document.getElementById('leftArrow');
	var rightArrow = document.getElementById('rightArrow');
	var counter = 0;

	// HIDE ALL IMAGES FUNCTION
	function hideImages() {
	  for (var i = 0; i < imageSlides.length; i++) {
	    imageSlides[i].classList.remove('visible');
	  }
	}

	// REMOVE ALL DOTS FUNCTION
	function removeDots() {
	  for (var i = 0; i < imageSlides.length; i++) {
	    circles[i].classList.remove('dot');
	  }
	}

	// SINGLE IMAGE LOOP/CIRCLES FUNCTION
	function imageLoop() {
	  var currentImage = imageSlides[counter];
	  var currentDot = circles[counter];
	  currentImage.classList.add('visible');
	  removeDots();
	  currentDot.classList.add('dot');
	  counter++;
	}

	// LEFT & RIGHT ARROW FUNCTION & CLICK EVENT LISTENERS
	function arrowClick(e) {
	  var target = e.target;
	  if (target == leftArrow) {
	    clearInterval(imageSlideshowInterval);
	    hideImages();
	    removeDots();
	    if (counter == 1) {
	      counter = (imageSlides.length - 1);
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    } else {
	      counter--;
	      counter--;
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    }
	  } 
	  else if (target == rightArrow) {
	    clearInterval(imageSlideshowInterval);
	    hideImages();
	    removeDots();
	    if (counter == imageSlides.length) {
	      counter = 0;
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    } else {
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    }
	  }
	}

	leftArrow.addEventListener('click', arrowClick);
	rightArrow.addEventListener('click', arrowClick);


	// IMAGE SLIDE FUNCTION
	function slideshow() {
	  if (counter < imageSlides.length) {
	    imageLoop();
	  } else {
	    counter = 0;
	    hideImages();
	    imageLoop();
	  }
	}

	setTimeout(slideshow, 1000);
	var imageSlideshowInterval = setInterval(slideshow, 10000);

</script>
</body>
</html>
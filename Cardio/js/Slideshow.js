var slideIndx = 1;
showSlides(slideIndx);

function nextSlide(x) {
  showSlides(slideIndx += x);
}

function currentSlide(x) {
  showSlides(slideIndx = x);
}

function showSlides(x) {
  var i;
  var slides = document.getElementsByClassName("Slides");
  if (x > slides.length) {slideIndx = 1}    
  if (x < 1) {slideIndx = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndx-1].style.display = "block";  
 
}

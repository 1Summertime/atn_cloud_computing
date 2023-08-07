
var Slideshow_containerHeight = document.querySelectorAll('.slideshow-container');
var c = Slideshow_containerHeight.childNodes;
console.log(c);

var oldShowSlideHeight = 0;
window.addEventListener("wheel", function(event) {
  if (event.deltaY > 0) {
    console.log("lăn chuột xuống")
    showSlideHeight(oldShowSlideHeight + 1);

  } else if (event.deltaY < 0) {
    console.log("Lăn chuột lên");
    showSlideHeight(oldShowSlideHeight - 1);
  }
});
 
function showSlideHeight(i) {
  Slideshow_containerHeight[oldShowSlideHeight].classList.remove('active');
  oldShowSlideHeight = (i + Slideshow_containerHeight.length) % Slideshow_containerHeight.length;
  Slideshow_containerHeight[oldShowSlideHeight].classList.add('active');
}
console.log(Slideshow_containerHeight);








var currentSlide = 0;

function showSlide(n) {
  var slides = Slideshow_containerHeight[oldShowSlideHeight].querySelectorAll('.slide');
  slides[currentSlide].classList.remove('active');
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function previousSlide() {
  showSlide(currentSlide - 1);
}

// Tự động chuyển slide sau một khoảng thời gian
setInterval(nextSlide, 5000);

// Đăng ký sự kiện cho các nút next và previous
var next = document.querySelectorAll('.nextBtn');
var prve = document.querySelectorAll('.prevBtn');
console.log(next);
console.log(prve);
next.forEach((nexts, index)=>{

  nexts.onclick = function() {
    
    nextSlide();
  }
});
prve.forEach( function(prves) {
  prves.onclick = function() {
   
    previousSlide();
  }
});
// Hiển thị slide đầu tiên khi trang được tải
showSlide(currentSlide);




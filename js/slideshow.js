document.addEventListener("DOMContentLoaded", function(event) {
  var images = document.getElementsByClassName('image');
  var time = 4000;
  var index = 0;

  function checkIndex(){
    if(index == images.length){
      index = 0;
    }
  }

  function resetImages(){
    for (var i = 0; i < images.length; i++) {
      images[i].style.opacity = "0";
    }
  }
  function showImage(){
    checkIndex();
    resetImages();
    for (var i = 0; i < images.length; i++) {
      if(i == index){
        images[i].style.opacity = "1";
        images[i].style.transition = "opacity 2s ease-in-out";
      }
    }
    index++;
  }
  showImage();
  setInterval(function(){ showImage(); }, time);

});


$(function() {
   $(".rslides").responsiveSlides();
 });


/*
var allImagesID = new Array();
var index = 0;
document.addEventListener( "DOMContentLoaded", function(){
  var slideshow = document.getElementById("slideshow");
  var images = slideshow.getElementsByTagName("img");
  for (var i = 0; i < images.length; i++) {
    //alert(images[i].src);
    allImagesID[i] = images[i].id;
  //  alert(allImagesName[i]);
  }
}, false);
var max= allImagesID.length;
swapImage(0);

function swapImage(id)
{
   for (var i = 0; i < allImagesID.length; i++) {
      if(id == i){
        alert("yeah");
        document.getElementById(allImagesID[i]).style.display = 'inline';
      }else {
        document.getElementById(allImagesID[i]).style.display = 'none';
      }
   }
   if(id <= max){
    setTimeout(swapImage(id),3000);
    id++;
   }
}
*/

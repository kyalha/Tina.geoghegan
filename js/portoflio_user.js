document.addEventListener("DOMContentLoaded", function(event) {
  function showFirstAlbum(){
    var sliderLargeImage = document.getElementById("slider3");
    var firstLargeImage = sliderLargeImage.getElementsByTagName("div");

    var title = sliderLargeImage.getElementsByTagName("p")[0];
    title.style.display= "block";

    var sliderSmallImage = document.getElementById("slider3-pager");
    var firstSmallImage = sliderSmallImage.getElementsByTagName("div");
    firstLargeImage[0].style.display="block";
    var classname = firstLargeImage[0].className;
    for (var i = 0; i < firstSmallImage.length; i++) {
      if(classname == firstSmallImage[i].className) {
        firstSmallImage[i].style.display="block";
      }
    }
    document.getElementById('enlarge').style.display= "inline";
    var largeImage = firstLargeImage[0];
    var folderName= largeImage.className;
    if(!largeImage.className.indexOf("imageDisplayed") > -1){
      largeImage.className = largeImage.className + " imageDisplayed";
    }
    document.getElementById(folderName).className += " selected";
  }
  showFirstAlbum();

  var buttons = document.getElementsByTagName('button');
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function(event){
      var targetElement = event.target || event.srcElement;
      displayImages(targetElement);
    }, false);
  }

  function displayImages(div) {
    resetMedia("large");
    resetMedia("thumb");
    resetMedia("title");
    resetMedia("buttonSelectedAttribute");
    resetMedia("imageDisplayedAttribute");
    var allThumbs= document.getElementsByName("slideThumb");
    var slideImages= document.getElementsByName("slideImage");
    var ul = document.getElementById("slider3-pager");
    if(!ul.getElementsByClassName(div.id).length){
      document.getElementById('noImages').style.display= "inline";
      document.getElementById('enlarge').style.display= "none";
      document.getElementById('slider3').style.float = "none";
    }else {
      document.getElementById('noImages').style.display= "none";
      document.getElementById('enlarge').style.display= "inline";
    }

    var firstImage= true;
    for (var j = 0; j < allThumbs.length; j++) {
      if(allThumbs[j].className == div.id){
        allThumbs[j].style.display = 'block';
        if(firstImage){
          slideImages[j].style.display = 'block';
          slideImages[j].className = slideImages[j].className + " imageDisplayed";
          firstImage=false;
        }
      }
    }
    var title = document.getElementById("slider3").getElementsByTagName("p")[0];
    title.innerHTML = "- " + div.id + " -";
    title.style.display= "block";
    document.getElementById(div.id).className += " selected";
  }

  var srcImages = [];
  var images = document.getElementById('slider3').getElementsByTagName('img');
  for(var i = 0; i < images.length; i++) {
    var newPath = images[i].src.substring(images[i].src.lastIndexOf("/")+1, images[i].src.length);
    srcImages.push(newPath);
  }
  var firstAlbum = document.getElementById("albumList").children[0];
  firstAlbum.style.background = "url('images/icons/folder-open.png') center top no-repeat;";
});

var indexImage = 0;
var change = false;
var maxIndexImages = 0;
var images = [];

function appearFullScreen (change) {
  var image = "";
  var sourceImage = "";
  var imageId = "";
  var idSelected = "";
  var classImage = "";
  var divImageSelected = "";
  var tempUrl = "";
  var urlImage = "";
  var slideImages = document.getElementsByName('slideImage');
  if(!change){
    for (var i = 0; i < slideImages.length; i++) {
      var classOfImage = slideImages[i].className;
      if(/. imageDisplayed/.test(slideImages[i].className)){
        divImageSelected = slideImages[i].getElementsByTagName('img')[0];
        idSelected = slideImages[i].getElementsByTagName('img')[0].id;
        var indexCut = slideImages[i].className.indexOf("imageDisplayed");
        var newClass = slideImages[i].className.substring(0,indexCut-1);
        classImage = newClass;
        tempUrl = divImageSelected.src;
        urlImage =tempUrl.substring(tempUrl.lastIndexOf("/"),tempUrl.length);
      }
    }
    for (var i = 0; i < slideImages.length; i++) {
      if(slideImages[i].className.indexOf(classImage) > -1 ){
        images.push(slideImages[i].getElementsByTagName('img')[0]);
      }
    }
    for (var i = 0; i < images.length; i++) {
      if(images[i].id == idSelected){
        indexImage = i;
      }
    }
  }else {
        image = images[indexImage];
        tempUrl= image.src;
        urlImage =tempUrl.substring(tempUrl.lastIndexOf("/"),tempUrl.length);
  }
  maxIndexImages = images.length;

  var countIn = indexImage+1;
  document.getElementById('countSlides').innerHTML = countIn + " / " + maxIndexImages;
  document.getElementById('countSlides').style.display = "inline";
  document.getElementById('fullScreenID').style.background = "url(images/gallery" + urlImage +") no-repeat center";
  document.getElementById('imageToshow').src = "images/gallery" + urlImage;
  document.getElementById('fullScreenID').style.transition = "opacity 1s ease-in-out";
  document.getElementById('fullScreenID').style.background = "#ffffff";
  document.getElementById('fullScreenID').style.width = "100%";
  document.getElementById('fullScreenID').style.height = "100%";
  document.getElementById('fullScreenID').style.position = "fixed";
  document.getElementById('fullScreenID').style.padding = "0";
  document.getElementById('fullScreenID').style.margin = "0";
  document.getElementById('fullScreenID').style.top = "0";
  document.getElementById('fullScreenID').style.left = "0";
  document.getElementById('fullScreenID').style.zIndex = "10";
  document.getElementById('fullScreenID').style.backgroundColor = "#000000";
  document.getElementById('close').style.display="inline";
  document.getElementById('enlarge').style.display="none";
  document.getElementById('left').style.display="inline";
  document.getElementById('right').style.display="inline";
  document.getElementById('left').style.opacity = "1";
  document.getElementById('right').style.opacity = "1";
  document.getElementById('imageToshow').style.display = "block";
  if(indexImage == 0){
    document.getElementById('left').style.opacity = "0.3";
  }
  else if(indexImage == maxIndexImages-1){
    document.getElementById('right').style.opacity = "0.3";
  }
}

function changePictureFull(direction){
  if(direction == "left" && indexImage > 0){
    indexImage--;
  }else if(direction == "right" && indexImage < maxIndexImages-1){
    indexImage++;
  }
  appearFullScreen(true);
}

function leaveFullScreen() {
  document.getElementById('fullScreenID').style.background = "none";
  document.getElementById('fullScreenID').style.width = "0";
  document.getElementById('fullScreenID').style.height = "0";
  document.getElementById('fullScreenID').style.position = "inherit";
  document.getElementById('fullScreenID').style.padding = "0";
  document.getElementById('fullScreenID').style.margin = "0";
  document.getElementById('fullScreenID').style.top = "0";
  document.getElementById('fullScreenID').style.left = "0";
  document.getElementById('fullScreenID').style.zindex = "0";
  document.getElementById('fullScreenID').style.backgroundColor = "none";
  document.getElementById('close').style.display="none";
  document.getElementById('enlarge').style.display="inline";
  document.getElementById('left').style.display="none";
  document.getElementById('right').style.display="none";
  document.getElementById('imageToshow').style.display = "none";
  document.getElementById('countSlides').style.display = "none";
  images = [];
}

window.onkeyup = function(e) {
  var key = e.keyCode ? e.keyCode : e.which;
  if (key == 37) {
    changePictureFull("left");
  }else if (key == 39) {
    changePictureFull("right");
  }
}

function resetMedia(format){
  if(format == "large"){
    var slideImage = document.getElementsByName('slideImage');
    for (var i = 0; i < slideImage.length; i++) {
      slideImage[i].style.display = "none";
    }
  }else if(format == "thumb"){
    var slideThumb = document.getElementsByName('slideThumb');
    for (var i = 0; i < slideThumb.length; i++) {
      slideThumb[i].style.display = "none";
    }
  }else if(format == "title" ){
    var listTitles = document.getElementById('slider3').getElementsByTagName('p');
    for (var i = 0; i < listTitles.length; i++) {
      listTitles[i].style.display = "none";
    }
  }else if(format == "imageDisplayedAttribute"){
    var slideImages = document.getElementsByName('slideImage');
    for (var i = 0; i < slideImages.length; i++) {
      if(/. imageDisplayed/.test(slideImages[i].className)){
        var indexCut = slideImages[i].className.indexOf("imageDisplayed");
        var newClass = slideImages[i].className.substring(0,indexCut-1);
        slideImages[i].className = newClass;
      }
    }
  }else if(format == "buttonSelectedAttribute"){
    var buttons = document.getElementById('albumList').getElementsByTagName('button');
    for (var i = 0; i < buttons.length; i++) {
      if(/. selected/.test(buttons[i].className)){
        var indexCut = buttons[i].className.indexOf("selected");
        var newClass = buttons[i].className.substring(0,indexCut-1);
        buttons[i].className = newClass;
      }
    }
  }
}

function changeImage(id){
  resetMedia("large");
  resetMedia("imageDisplayedAttribute");
  document.getElementById(id).parentElement.style.display = "block";
  var imageToDisplay = document.getElementById(id).parentElement;
  if(!imageToDisplay.className.indexOf("imageDisplayed") > -1){
    imageToDisplay.className = imageToDisplay.className + " imageDisplayed";
  }
  document.getElementById("description"+id).style.display = "inline";
}

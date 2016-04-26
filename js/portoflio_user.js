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
    var allThumbs= document.getElementsByName("slideThumb");
    var slideImages= document.getElementsByName("slideImage");
    var ul = document.getElementById("slider3-pager");
    if(!ul.getElementsByClassName(div.id).length){
      document.getElementById('noImages').style.display= "inline";
    }else {
      document.getElementById('noImages').style.display= "none";
    }
    var firstImage= true;
    for (var j = 0; j < allThumbs.length; j++) {
      if(allThumbs[j].className == div.id){
        allThumbs[j].style.display = 'block';
        if(firstImage){slideImages[j].style.display = 'block';firstImage=false;}
      }
    }
    var title = document.getElementById("slider3").getElementsByTagName("p")[0];
    title.innerHTML = "- " + div.id + " -";
    title.style.display= "block";
    //if(divsClass.length == 0 || divsClass == undefined){
    //  document.getElementById('noImages').innerHTML= '<p style="padding: 10px;"> No images to display </p>';
    //    document.getElementById('noImages').style.display= "inline";
    //      document.getElementById('slider3-pager').style.display= "none";
    //    document.getElementById('enlarge').style.display= "none";
    //  }

    /*  var divs = document.getElementsByTagName('div');
    var regex = /albumTitle/, matches = [];
    for(i=0; i< allThumbs.length; i++){
    if(regex.test(allThumbs[i].id)){
    alert("yo")
    matches.push(allThumbs[i]);
  }
}
*/
//alert(matches.length);
//  document.getElementById('albumTitle'+/abc/).style.display= "inline";

//  document.getElementById('slider3-pager').style.display= "inline-flex";
//  document.getElementById('enlarge').style.display= "inline";
}
});





function appearFullScreen (indexImage) {
  //  document.getElementById('fullScreenID').style.background = "url(../images/gallery/" +srcImages[indexImage] +") no-repeat center";

  document.getElementById('imageToShow').src = "images/gallery/" +srcImages[indexImage];
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
  document.getElementById('left').style.display="inline";
  document.getElementById('right').style.display="inline";
  document.getElementById('left').style.opacity = "1";
  document.getElementById('right').style.opacity = "1";
  if(indexImage == 0){
    document.getElementById('left').style.opacity = "0.5";
  }
  else if(indexImage == srcImages.length-1){
    document.getElementById('right').style.opacity = "0.5";
  }
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
  document.getElementById('imageToShow').style.display = "none";
}

var indexImage = 0;
var srcImages = [];
document.addEventListener("DOMContentLoaded", function(event) {
  var images = document.getElementById('slider3').getElementsByTagName('img');
  for(var i = 0; i < images.length; i++) {
    var newPath = images[i].src.substring(images[i].src.lastIndexOf("/")+1, images[i].src.length);
    srcImages.push(newPath);
  }
  var firstAlbum = document.getElementById("albumList").children[0];
  firstAlbum.style.background = "url('images/icons/folder-open.png') center top no-repeat;";
});

function changePictureFull(direction){
  if(direction == "left" && indexImage > 0){
    indexImage--;
    appearFullScreen(indexImage);
  }else if(direction == "right" && indexImage < srcImages.length-1){
    indexImage++;
    appearFullScreen(indexImage);
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
  }
}

function changeImage(id){
  resetMedia("large");
  document.getElementById(id).parentElement.style.display = "block";
  document.getElementById("description"+id).style.display = "inline";
}

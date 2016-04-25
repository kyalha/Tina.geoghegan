document.addEventListener("DOMContentLoaded", function(event) {
    function showFirstAlbum(){
      var sliderLargeImage = document.getElementById("slider3");
      var firstLargeImage = sliderLargeImage.getElementsByTagName("div");
      var title = firstLargeImage[0].getElementsByTagName("p");
      title[0].style.display= "block";
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
});

function displayImages(classname) {
    resetImages();
    var rslides = document.getElementsByClassName('rslides');
    var allThumbs= document.getElementsByName("slideThumb");
    var divsClass = document.getElementsByClassName(classname);
    var slideImage= document.getElementsByName("slideImage");

    var divs = document.getElementsByTagName('div');
    var regex = /albumTitle(.)/, matches = [];
    for(i=0; i< divs.length; i++){
        if(regex.test(divs[i].id)){
            matches.push(divs[i]);
        }
    }
    alert(matches.length);
  //  document.getElementById('albumTitle'+/abc/).style.display= "inline";

    //  document.getElementById('slider3-pager').style.display= "inline-flex";
  //  document.getElementById('enlarge').style.display= "inline";
    var slidesDiv = document.getElementById("slider3");
    if(!slidesDiv.getElementsByClassName(classname)){
      alert("yo");
      document.getElementById('noImages').style.display= "inline";
    }

    /*
    for (var j = 0; j < allThumbs.length; j++) {
      if(allThumbs[j].name == classname){
        allThumbs[j].style.display = 'inline';

      }else {
        allThumbs[j].style.display = 'none';
      }
    }
    if(divsClass.length == 0 || divsClass == undefined){
      //  document.getElementById('noImages').innerHTML= '<p style="padding: 10px;"> No images to display </p>';
      //    document.getElementById('noImages').style.display= "inline";
      //      document.getElementById('slider3-pager').style.display= "none";
      document.getElementById('enlarge').style.display= "none";
    }
    */
  }



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

  function changePicture(direction){
    if(direction == "left" && indexImage > 0){
      indexImage--;
      appearFullScreen(indexImage);
    }else if(direction == "right" && indexImage < srcImages.length-1){
      indexImage++;
      appearFullScreen(indexImage);
    }
  }

  function resetImages(){
    var divs = document.getElementsByName('slideImage');
    var divsThumb = document.getElementsByName('slideThumb');
    for (var i = 0; i < divs.length; i++) {
      divs[i].style.display = "none";
      divsThumb[i].style.display = "none";
    }
  }

  function changeImage(id){
    resetImages();
    document.getElementById(id).parentElement.style.display = "block";
    document.getElementById("description"+id).style.display = "inline";
    document.getElementById("albumTitle"+id).style.display = "block";
  }

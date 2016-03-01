<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tinageo";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
$select_folders = "select * from folder;";
$result_folders = mysqli_query($con,$select_folders);
$nd_result_folders = mysqli_query($con,$select_folders);

$select_images = "select * from image;";
$result_images = mysqli_query($con,$select_images);
$error='';
if (mysqli_connect_errno($con))
{
  return false;
}

if(isset($_POST['insertFiles'])){
  error_log(print_r("blah"));

  $folder = $_POST['selectorDir'];
  $fileName = $_POST['fileName'];
  $selectedFile = $_POST['selectedFile'];
  $description = $_POST['description'];
//  $uploaddir = "/images/gallery/".$folder+"/";


  //$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  $insert_images="insert into image(folder,path,name) values('".$folder ."', 'images/gallery/". $fileName."','".$fileName."','".$description."');";
  $result_insertImages= mysqli_query($con,$insert_images);

  //if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  //}
///Applications/MAMP/htdocs/Tina.geoghegan/
$target_dir = "Applications/MAMP/htdocs/Tina.geoghegan/images/gallery/";
error_log(print_r($_FILES,true));
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
error_log(print_r(basename($_FILES["fileToUpload"]["name"])));
    // Check if file already exists
   /* if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {*/
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
   // }
  }


if(isset($_POST['folderNameToSave'])){
  $folderNameToSave = $_POST['folderNameToSave'];
  if(!empty($folderNameToSave) && $folderNameToSave != ''){
      $check_nameFolder="select * from folder where name = '".  $folderNameToSave ."');";
      $result_check= mysqli_query($con,$check_nameFolder);
      if (mysqli_num_rows($result_check) == 1) {
        $error = 'A folder exist already with this name';
       }
      else {
        $insert_folder="insert into folder(name) values('" . $folderNameToSave ."');";
        $result_insertFolder= mysqli_query($con,$insert_folder);
      }
  }
}

if(isset($_POST['selectDirectory']) && isset($_POST['toDelete'])){
  $folderNameToDelete = $_POST['selectDirectory'];
  $toDelete = $_POST['toDelete'];
  if(!empty($folderNameToDelete) && $folderNameToDelete != '' && !empty($toDelete)){
      $check_nameFolder="select * from folder where name = '".  $folderNameToDelete ."');";
      $result_check= mysqli_query($con,$check_nameFolder);
      if (mysqli_num_rows($result_check) == 0) {
        $delete_folder="delete from folder where name = '" . $folderNameToDelete ."';";
        $result_deleteFolder= mysqli_query($con,$delete_folder);
       }
  }
}

if(isset($_POST['exhibitionID'])){
  $content = $_POST['exhibitionID'];
  $check_ifMultimediaExists="select * from multimedia where id ='exhibition';";
  $result_check= mysqli_query($con,$check_ifMultimediaExists);
   if(!empty($content) && $content != ''){
      if (mysqli_num_rows($result_check) == 0) {
        $insert_exhib="insert into multimedia (id,content) values ('exhibition', '" . $content ."');";
        $result_insertExhib= mysqli_query($con,$insert_exhib);
       }else{
         $update_exhib="update multimedia set content = '" . $content ."' where id='exhibition';";
        $result_updateExhib= mysqli_query($con,$update_exhib);
       }
    }
}

if(isset($_POST['biographyID'])){
  $content = $_POST['biographyID'];
  $check_ifMultimediaExists="select * from multimedia where id ='biography';";
  $result_check= mysqli_query($con,$check_ifMultimediaExists);
   if(!empty($content) && $content != ''){
      if (mysqli_num_rows($result_check) == 0) {
        $insert_exhib="insert into multimedia (id,content) values ('biography', '" . $content ."');";
        $result_insertExhib= mysqli_query($con,$insert_exhib);
       }else{
         $update_exhib="update multimedia set content = '" . $content ."' where id='biography';";
        $result_updateExhib= mysqli_query($con,$update_exhib);
       }
    }
}

if(isset($_POST['selectDirectory']) && isset($_POST['newFolderToUpdate'])){
  $folderNameToUpdate = $_POST['selectDirectory'];
  $newFolder = $_POST['newFolderToUpdate'];
  if(!empty($newFolder) && $newFolder != ''){
        $update_folder="update folder set name = '" . $newFolder ."' where name ='".$folderNameToUpdate. "';";
        $result_deleteFolder= mysqli_query($con,$update_folder);
  }
}


if(isset($_POST['fileID'])){
  $target_path = "images/gallery/";
  $target_path = $target_path . basename( $_FILES['fileID']['name']); 

  if(move_uploaded_file($_FILES['fileID']['tmp_name'], $target_path)) {
      echo "The file ".  basename( $_FILES['fileID']['name']). 
      " has been uploaded";
  } else{
      echo "There was an error uploading the file, please try again!";
  }
}


?>

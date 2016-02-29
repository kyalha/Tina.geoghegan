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
  $folder = $_POST['selectorDir'];
  $fileName = $_POST['fileName'];
  $selectedFile = $_POST['selectedFile'];
  $description = $_POST['description'];
  $uploaddir = "/images/gallery/".$folder+"/";
  $uploadfile = $uploaddir . basename($_FILES['list']['name']);
  $check_ifImageExist="select * from image where title ='". $fileName ."';";
  $result_check= mysqli_query($con,$check_ifImageExist);
      if (mysqli_num_rows($result_check) == 1) {
        $error = "An image has already this title";
       }else{
         $insert_images="insert into image(folder,path,title,description) values('".$folder ."', 'images/gallery/". $selectedFile."','".$fileName."','".$description."');";
          $result_insertImages= mysqli_query($con,$insert_images);
       }
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

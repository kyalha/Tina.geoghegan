<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tinageo";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
$select_folders = "select * from folder;";
$result_folders = mysqli_query($con,$select_folders);
$select_images = "select * from image;";
$result_images = mysqli_query($con,$select_images);
$error='';
if (mysqli_connect_errno($con))
{
  return false;
}

if(isset($_GET['insertFiles'])){
  //$folder = $_GET['selectorDir'];
  //$insert_images="insert into image(folder,path,name) values('".$folder ."', 'images/gallery/". $fileName."','".$fileName."','".$description."');";
  //$result_insertImages= mysqli_query($con,$insert_images);

$target_dir = "images/gallery/";

$target_file = $target_dir . basename($_FILES['name']['name']);
$uploadOk = 1;
$imageFileType = basename($_FILES['name']['type']);

    if (file_exists($target_file)) {
         error_log(print_r(basename("Sorry, file already exists."),true));
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        error_log(print_r(basename( "Sorry, only JPG, JPEG, PNG & GIF files are allowed."),true));
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
          error_log(print_r(basename("Sorry, your file was not uploaded."),true));
    } else {

        if (move_uploaded_file($_FILES["name"]["tmp_name"], $target_file)) {
          error_log(print_r(basename( $_FILES["fileToUpload"]["name"]. " has been uploaded."),true));
        } else {
          error_log(print_r(basename("Sorry, there was an error uploading your file."),true));
        }
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

if(isset($_POST['exhibitionID']))
  $exhibitionToUpdate = $_POST['exhibitionID'];
  if(!empty($exhibitionToUpdate) && $exhibitionToUpdate != ''){
        $update_exhib="update multimedia set content = '" . $exhibitionToUpdate ."' where id=exhibition;";
        $result_exhib= mysqli_query($con,$update_exhib);
  }

if(isset($_POST['selectDirectory']) && isset($_POST['newFolderToUpdate'])){
  $folderNameToUpdate = $_POST['selectDirectory'];
  $newFolder = $_POST['newFolderToUpdate'];
  if(!empty($newFolder) && $newFolder != ''){
      $check_nameFolder="select * from folder where name = '".  $folderNameToUpdate ."');";
      $result_check= mysqli_query($con,$check_nameFolder);
      if (mysqli_num_rows($result_check) == 0) {
        $update_folder="update folder set name = '" . $newFolder ."' where name ='".$folderNameToUpdate. "';";
        $result_deleteFolder= mysqli_query($con,$update_folder);
       }
  }
}

?>

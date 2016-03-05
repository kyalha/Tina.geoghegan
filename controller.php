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
$select_firstFolder= "select name from folder order by name ASC;";
$result_firstFolder= mysqli_query($con,$select_firstFolder);
$first_folder="";
if ($result_firstFolder->num_rows > 0) {
    while($row = $result_firstFolder->fetch_assoc()) {
      $first_folder= $row["name"];
      break;
    }
  }
$error='';
if (mysqli_connect_errno($con))
{
  return false;
}

if(isset($_GET['insertFiles']) && isset($_GET['title'])){
  $folder = $_GET['selectorDir'];
  $title = $_GET['title'];
  $description = $_GET['fileDescription'];
  $target_dir = "images/gallery/";
  error_log(print_r(basename( $_FILES["name"]["name"]. " has been uploaded."),true));
  $target_file = $target_dir . basename($_FILES['name']['name']);
  $uploadOk = 1;
  $imageFileType = basename($_FILES['name']['type']);
    if (file_exists($target_file)) {
         error_log(print_r(basename("Sorry, file already exists."),true));
        $uploadOk = 0;
    }
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        error_log(print_r(basename( "Sorry, only JPG, JPEG, PNG & GIF files are allowed."),true));
        $uploadOk = 0;
    }
    else if ($uploadOk == 0) {
          error_log(print_r(basename("Sorry, your file was not uploaded."),true));
    } else if($uploadOk != 0){
        if (move_uploaded_file($_FILES["name"]["tmp_name"], $target_file)) {
          error_log(print_r(basename( $_FILES["name"]["name"]. " has been uploaded."),true));
          $insert_images="insert into image(folder,path,name,description) values('".$folder ."', '". $target_file."','".$title."','".$description."');";
          $result_insertImages= mysqli_query($con,$insert_images);
          chmod($target_file, 0755);
          $error = "Your file has been added";
        } else {
          error_log(print_r(basename("Sorry, there was an error uploading your file."),true));
        }
    }
  }

if(isset($_POST['removeFiles'])){
    $target_dir = "images/gallery/";
    $countID= $_POST['countID'];
    $uploadOk = 1;
    for ($i=0; $i < $countID; $i++) {
      $target_file = $_POST['filePath'.$i];
      $titleImage= $_POST['titleImage'.$i];
      if(file_exists("images/gallery/" . $target_file)){

      }
      if (!unlink("images/gallery/" . $target_file))
        {
          error_log(print_r(basename("Error deleting $target_file"),true));
        }
      else
        {
          $delete_images="delete from image where name= '" .$titleImage . "';";
          $result_delete_images= mysqli_query($con,$delete_images);
          error_log(print_r(basename("Success for deleting $target_file"),true));
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
      $selectImagesFromFolder = "select * from image where folder = '" . $folderNameToDelete."';" ;
      $result_images= mysqli_query($con,$selectImagesFromFolder);
      if($result_images->num_rows > 0) {
          while($row = $result_images->fetch_assoc()) {
            $deleteImage= "delete from image where id = '" . $row[0]."';" ;
            $result_deleteImage= mysqli_query($con,$deleteImage);
          }
        }
      $check_nameFolder="select * from folder where name = '".  $folderNameToDelete ."';";
      $result_check= mysqli_query($con,$check_nameFolder);
      if (mysqli_num_rows($result_check) == 0) {
        $delete_folder="delete from folder where name = '" . $folderNameToDelete ."';";
        $result_deleteFolder= mysqli_query($con,$delete_folder);
       }
  }
}

if(isset($_POST['exhibitionID'])){
  $exhibitionToUpdate = $_POST['exhibitionID'];
  if(!empty($exhibitionToUpdate) && $exhibitionToUpdate != ''){
        $update_exhib="update multimedia set content = '" . $exhibitionToUpdate ."' where id=exhibition;";
        $result_exhib= mysqli_query($con,$update_exhib);
  }
}

if(isset($_POST['selectDirectory']) && isset($_POST['newFolderToUpdate'])){
  $folderNameToUpdate = $_POST['selectDirectory'];
  $newFolder = $_POST['newFolderToUpdate'];
  if(!empty($newFolder) && $newFolder != ''){
      $check_nameFolder="select * from folder where name = '".  $folderNameToUpdate ."';";
      $result_check= mysqli_query($con,$check_nameFolder);
      if (mysqli_num_rows($result_check) == 0) {
        $update_folder="update folder set name = '" . $newFolder ."' where name ='".$folderNameToUpdate. "';";
        $result_deleteFolder= mysqli_query($con,$update_folder);
       }
  }
}
if(isset($_POST['updateName'])){
  $newName= $_POST['newName'];
  $oldName= $_POST['oldName'];
  $id= $_POST['id'];
  if(!empty($newName) && $newName != ''){
    $updateNameFile="update image set name = '". $newName . "' where id = ".$id.";";
    error_log(print_r(basename($updateNameFile),true));
    $result_updateName= mysqli_query($con,$updateNameFile);
  }
}
 if(isset($_POST['updateDescription'])){
  $newDescription = $_POST['newDescription'];
  $oldescription = $_POST['oldDescription'];
 if(!empty($newDescription) && $newDescription != ''){
    $updateDescriptionFile="update image set description = '". $newDescription . "' where id = ".  $id .";";
    $result_updateDescription= mysqli_query($con,$updateDescriptionFile);
  }
}

?>

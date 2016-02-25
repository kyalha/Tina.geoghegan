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
  $exhibitionToUpdate = $_POST['exhibitionID'];
  if(!empty($exhibitionToUpdate) && $exhibitionToUpdate != ''){
        $update_exhib="update multimedia set content = '" . $exhibitionToUpdate ."' where id=exhibition;";
        $result_exhib= mysqli_query($con,$update_exhib);
  }

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
/*
	if (isset($_POST['changePassword'])) {
		if (empty($_POST['oldPassword']) || empty($_POST['newPassword'] ||
					empty($_POST("confirmNew")) )) {
			$error = "invalid password";
		}else if($_POST['newPassword'] != $_POST['confirmNew']){
			$error = "New password inserted is not the same.";
		}else if($_POST['newPassword'] != $_POST['oldPassword']){
			$error = "Your password is similar to the new one.";
		}
	else{
		$value_user = stripslashes($value_user);
		$value_password = stripslashes($value_password);
		$value_user = mysqli_real_escape_string($link,$value_user);
		$value_password = mysqli_real_escape_string($link,$value_password);
	  $sql="select * from admin where username='$value_user' AND password='$value_password'";

		$query = mysqli_query($link,$sql);
		$error = mysqli_num_rows($query);	if (mysqli_num_rows($query) == 1) {
				$_SESSION['username']= $value_user;  // Initializing Session with value of PHP Variable
				} else {
				$error = "Wrong administrator name or password";
			}
		mysqli_close($link); // Closing Connection
		}
	}
	else if (isset($_POST['login'])) {
		if (empty($_POST['admin']) || empty($_POST['password'])) {
			$error = "invalid admin id or password";
		}
	else{
		$admin = stripslashes($admin);
		$value_password = stripslashes($value_password);
		$admin = mysqli_real_escape_string($link,$admin);
		$value_password = mysqli_real_escape_string($link,$value_password);
$sql="select * from admin where username='$admin' AND password='$value_password'";

		$query = mysqli_query($link,$sql);
		$error = mysqli_num_rows($query);
	if (mysqli_num_rows($query) == 1) {
				$_SESSION['username']= $value_user;  // Initializing Session with value of PHP Variable
				//header("location: connected.php"); // Redirecting To Other Page
			} else {
				$error = "Wrong administrator name or password";
			}

		mysqli_close($link); // Closing Connection
		}
	}
*/
?>

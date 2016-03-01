CREATE DATABASE TINAGEO;
USE TINAGEO;
mysql -h host -user -p TINAGEO;
SET PASSWORD ilovethemist;

CREATE TABLE admin {
	adminID VARCHAR(30) NOT NULL PRIMARY KEY,
	password VARCHAR(30) NOT NULL
}
<?php
	if(sizeof($directories) > 1 ){
		echo'Folder: <select class="selectDirectory">';
		foreach ($folderTitle as $title) {

			 echo '<option>'. $title. '</option>' ;
			foreach ($allImages as $image) {
				echo $image;
			}
		}
		echo '</select>';
	}else {
		$h1_folder= $folder[sizeof($folder)-1];
		echo'Folder: <select class="selectDirectory">' . '<option>'. $h1_folder. '</option>'. '</select>';
		foreach ($allImages as $image) {
			echo $image;
		}
	}
?>

$gallery = "images/gallery/";
$directories = glob("images/gallery/*");
$allImages=[];
$countImages =0;
$countFolders =0;
$folderTitle=[];

if(sizeof($directories) > 1 ){
	foreach ($directories as $directory) {
		$folder =  explode("/", $directory);
		$folderTitle[$countFolders] = $folder[sizeof($folder)-1];
		if ($dh = opendir($directories[0])){
					while (($file = readdir($dh))){
						$countImages++;
						if($file != "." && $file != ".."){
								$allImages[$countImages]='<img src="'.$directories[0].'/'.$file.'" alt="' . $file .'" style="width:100px;height:100px;padding-right:10px;">';
						}
					}
					closedir($dh);
		}
		$countFolders++;
	}
}else {
		$folder =  explode("/", $directory[0]);
		if ($dh = opendir($directory)){
					while (($file = readdir($dh))){
						$countImages++;
						if($file != "." && $file != ".."){
								$allImages[$countImages]='<img src="'.$directory.'/'.$file.'" alt="' . $file .'" style="width:100px;height:100px;padding-right:10px;">';
						}
					}
					closedir($dh);
		}
}
<Directory "/Applications/MAMP/htdocs">
		#
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.2/mod/core.html#options
    # for more information.
    #
    Options All

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   Options FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Order allow,deny
    Allow from localhost ::1

    XSendFilePath "/Applications/MAMP/htdocs"
</Directory>

<?php
session_start();
include 'config.php';
if(isset($_POST['ssave']) && $_SESSION['userid']!=''){
	include_once 'config.php';
	$first= $_POST['sfname'];
	$last= $_POST['slname'];
    $dob = $_POST['sdob'];
    $gen = $_POST['gender'];
	$email=$_POST['semail'];
    $url = $_POST['surl'];
    $city = $_POST['scity'];
    $country = $_POST['scountry'];
    $company = $_POST['scompany'];
    $post = $_POST['spost'];
    $userid = $_SESSION['userid'];
	
    
    
    $sql="UPDATE users SET firstname='$first', lastname='$last', dob='$dob', gender='$gen', email='$email', 
            url='$url', city='$city', country='$country', company='$company', post='$post' WHERE userid=$userid;  ";
    if($dob==''){
        $sql="UPDATE users SET firstname='$first', lastname='$last', gender='$gen', email='$email', 
            url='$url', city='$city', country='$country', company='$company', post='$post' WHERE userid=$userid;  ";
    }
    echo $sql;
    mysqli_query($conn, $sql);	
    if(empty($_FILES["spp"]["name"])){
        echo "empty";
        header("Location: ../personal.php");
        exit();
    }
    $target_dir = "../pp/";
    $target_file = $target_dir . $_SESSION['userid'];
	echo $target_file. "<br>";
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $target_file = $target_dir . $_SESSION['userid'] ;
    //echo $imageFileType;
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["spp"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        unlink($target_file);
    }
    // Check file size
    if ($_FILES["spp"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["spp"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["spp"]["name"]). " has been uploaded.";
			
			echo " to ".$target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    
	header("Location: ../personal.php");
    include_once 'close.php';
	exit();
}
else{
	
	echo "not set";
    include_once 'close.php';
    header("Location: ../personal.php");
	exit();
}

?>
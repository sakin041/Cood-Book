<?php
session_start();
include 'config.php';
if(isset($_POST['savep'])){
    $oldp = $_POST['oldp'];
    $newp = $_POST['newp'];
    $newpc = $_POST['newpc'];
    if($newp != $newpc){
        echo "confirm new password correctly";
        exit();
    }
    
    $me = $_SESSION['userid'];
    $sql = "SELECT * FROM users WHERE userid=$me";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	if($row['pass'] != $oldp){
		echo "password does not match";
		exit();
	}
	
	$sql = "UPDATE users SET pass='$newp' WHERE userid=$me";
	echo $sql;
	$result = mysqli_query($conn,$sql);
	header("Location: ../personal.php");
}
else{
	echo "not set";
	header("Location: ../personal.php");
}
?>
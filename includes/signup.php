<?php
session_start();
if(isset($_POST['signup'])){
	include_once 'config.php';
	$first= $_POST['firstname'];
	$last= $_POST['lastname'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$email=$_POST['email'];
	$sql = "INSERT INTO users(username,pass,firstname,lastname,email)
			VALUES('$user','$pass','$first','$last','$email');";
	mysqli_query($conn, $sql);		
	echo "success";
    $sql = "SELECT * FROM users where username='$user' AND pass='$pass';";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['mycity'] = $row['city'];
    $_SESSION['mycon'] = $row['country'];
	header("Location: ../personal.php");
    include_once 'close.php';
	exit();
}
else{
	header("Location: ../index.php");
	echo "not set";
    include_once 'close.php';
	exit();
}

?>
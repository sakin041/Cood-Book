<?php
session_start();
if(isset($_POST['login'])){
	include_once 'config.php';
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$sql = "SELECT * FROM users where username='$user' AND pass='$pass';";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck < 1){
		echo '<p style="padding:50px 200px;"> username and password does not match!</p>';
        echo '<a style="padding-left:200px;" href="../index.php"> Back to Code Crunch </a>';
        include_once 'close.php';
	}
	else{
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
}
else{
	echo "not set";
    include_once 'close.php';
	//header("Location: ../index.php");
	//exit();
}

?>
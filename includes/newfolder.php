<?php
session_start();
if(isset($_POST['foldercreate'])){
	include_once 'config.php';
	$fname=$_POST['foldername'];
    $cat=$_POST['cat'];
    $userid=$_SESSION['userid'];
	$sql = "INSERT INTO folders(foldername,category,created,userid)
			VALUES('$fname','$cat',now(),$userid);";
    echo $sql;
	mysqli_query($conn,$sql);
    header("Location: ../personal.php");
    exit();
    /*
	$row = mysqli_fetch_assoc($result);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck < 1){
		echo '<p style="padding:50px 200px;"> username and password does not match!</p>';
        echo '<a style="padding-left:200px;" href="../index.php"> Back to Code Crunch </a>';
	}
	else{
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        header("Location: ../personal.php");
        exit();
	}*/
}
else{
	echo "not set";
	//header("Location: ../index.php");
	//exit();
}

?>
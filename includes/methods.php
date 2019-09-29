<?php


function countfolder(){
    include_once 'config.php';
    $userid=$_SESSION['userid'];
    $sql = "SELECT * FROM folders WHERE userid='$userid';";
    $result = mysqli_query($conn,$sql);
	echo mysqli_num_rows($result);
}

function getfolder(){
    include_once 'config.php';
    $userid=$_SESSION['userid'];
    $sql = "SELECT * FROM folders WHERE userid='$userid';";
    $result = mysqli_query($conn,$sql);
	echo mysqli_num_rows($result);
}

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



?>
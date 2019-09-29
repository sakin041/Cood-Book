<?php
session_start();
include 'includes/config.php';    
$fr = $_GET['fr'];
$fd = $_GET['fd'];

$sql= "SELECT * FROM follows WHERE follower=$fr AND followed=$fd";
$resultfl = mysqli_query($conn,$sql);
$numrow = mysqli_num_rows($resultfl);
if($numrow < 1){
    $sql= "INSERT INTO follows(follower,followed) VALUES($fr,$fd)";
}
else{
    $sql= "DELETE FROM follows WHERE follower=$fr AND followed=$fd";
}

mysqli_query($conn,$sql);
header("Location: user.php?id=".$fd);

?>
      
       
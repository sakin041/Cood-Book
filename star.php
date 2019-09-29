<?php
session_start();
include 'includes/config.php';    
$ur = $_GET['userid'];
$fl = $_GET['fileid'];
$fol = $_GET['folderid'];
$id = $_GET['id'];

$sql= "SELECT * FROM likes WHERE userid=$ur AND fileid=$fl";
$resultfl = mysqli_query($conn,$sql);
$numrow = mysqli_num_rows($resultfl);
if($numrow < 1){
    $sql= "INSERT INTO likes(userid,fileid,liketime) VALUES($ur,$fl,now())";
}
else{
    $sql= "DELETE FROM likes WHERE userid=$ur AND fileid=$fl";
}

mysqli_query($conn,$sql);
header("Location: user.php?id=".$id."&folderid=".$fol);

?>
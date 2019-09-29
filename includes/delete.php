<?php
session_start();
include 'config.php';
if(isset($_GET['folderid'])){
	$folderid = $_GET['folderid'];
	$sql = "SELECT * FROM folders WHERE folderid=$folderid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if($row['userid']==$_SESSION['userid']){
		$sql = "SELECT * FROM files WHERE folderid=$folderid";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			$file = "../files/".$row['fileid'];
			echo $file."<br>";
			unlink($file);
		}
		$sql = "DELETE FROM folders WHERE folderid=$folderid";
		echo $sql;
		mysqli_query($conn,$sql);
		header("Location: ../personal.php");
	}
}
else{
	$fileid= $_GET['fileid'];
	$sql = "SELECT * FROM files WHERE fileid=$fileid";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if($row['userid']==$_SESSION['userid']){
	$sql = "DELETE FROM files WHERE fileid=$fileid;";
	echo $sql;
	mysqli_query($conn,$sql);
	
	mysqli_query($conn,$sql);
	$file = "../files/".$fileid;
	echo $file;
	unlink($file);
		header("Location: ../personal.php");
	}
}




?>
<?php
session_start();
include_once 'config.php';
if(!isset($_POST['folderlst'])){
	die();
}
if(isset($_POST['save'])){
    $userid=$_SESSION['userid'];
    $title=$_POST['title'];
    $code=$_POST['code'];
    $folderid=$_POST['folderlst'];
    
    echo $userid."<br>";
    echo $title."<br>";
    echo $folderid."<br>";
    echo $code."<br>";
    
    $sql = "INSERT INTO files(filename,folderid,created,userid) 
                    VALUES('$title',$folderid,now(),$userid);";
    
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        $file = "../files/".$last_id;
        file_put_contents($file, $code);
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $sql = "SELECT * FROM folders WHERE folderid=$folderid";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row['category'] == 'private'){
        header("Location: ../private.php?folderid=".$folderid);
    }
    else{
        header("Location: ../personal.php?folderid=".$folderid);
    }
}
else{
    die();
}
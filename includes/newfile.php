<?php
session_start();
include_once 'config.php';
if(isset($_POST['upload'])){
	//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
    // Count # of uploaded files in array
    $total = count($_FILES['filelist']['name']);

    // Loop through each file
    for($i=0; $i<$total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['filelist']['tmp_name'][$i];

      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "../uploadFiles/" . $_FILES['filelist']['name'][$i];
        $fname = $_FILES['filelist']['name'][$i];
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {

          //Handle other code here
            $code = file_get_contents($newFilePath);
            $code = mysqli_real_escape_string($conn,$code);
            $folderid=$_POST['folderlst'];
            $userid=$_SESSION['userid'];
	        $sql = "INSERT INTO files(filename,folderid,created,userid) 
                    VALUES('$fname',$folderid,now(),$userid);";
            echo $sql."\n";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                //echo "New record created successfully. Last inserted ID is: " . $last_id;
                //echo dirname($newFilePath)."/".$last_id;
                $final = "../files/".$last_id;
                rename($newFilePath,$final);
                echo $final;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //mysqli_query($conn,$sql);
            if($_POST['privacy'] == 'private'){
				header("Location: ../private.php?folderid=".$folderid);
			}
			else{
				header("Location: ../personal.php?folderid=".$folderid);
			}
            
            

        }
      }
    }
    //header("Location: ../personal.php");
    exit();
    /*
    if(isset($_FILES['filelist'])){
		foreach($_FILES['filelist']['name'] as $key => $name){
			move_uploaded_file($_FILES['filelist']['name'][$key],'./uploads/'.$name);
            echo "uploaded"; 
		}
	}
	
	include_once 'database.php';
	$fname=$_POST['folder_name'];
    $path=$_POST['path'];
    $username=$_SESSION['username'];
	$sql = "INSERT INTO folder(folder_name,path,creator)
			VALUES('$fname','$path','$username');";
    echo $sql;
	
	mysqli_query($conn,$sql);
    header("Location: ../personal.php?path=".$path);
    exit();
	*/
}
else{
	echo "not set";
	//header("Location: ../index.php");
	//exit();
}

?>
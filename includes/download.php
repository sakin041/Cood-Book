<?php 
session_start();
include_once 'config.php';
$file_id = $_GET['fileid'];
$sql = " SELECT * FROM files where fileid=".$file_id;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$filename = $row['filename'];



$download_file =  "../files/".$row['fileid'];
// Check file is exists on given path.
if(file_exists($download_file))
{
  // Getting file extension.
  //$extension = explode('.',$filename);
  //$extension = $extension[count($extension)-1]; 

$split_point = '.';
$stringpos = strrpos($filename, $split_point, -1);
$extension = substr($filename,$stringpos);
  // Supports for download resume
  header('Accept-Ranges: bytes');  
  // Calculate File size
  header('Content-Length: ' . filesize($download_file));  
  header('Content-Encoding: none');
  // Change the mime type if the file is not PDF
  header('Content-Type: application/'.$extension);  
  // Make the browser display the Save As dialog
    echo $download_file;
    header("Content-disposition: attachment; filename=".$filename);       
    readfile($download_file);
  exit();
}
else
{
  echo 'File does not exists on given path';
}


?>
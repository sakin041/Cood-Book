<?php
session_start();
include 'config.php';
$folderid = $_GET['folder'];

$sql = "SELECT * FROM folders WHERE folderid=".$folderid;
echo $sql."<br>";
$result = mysqli_query($conn,$sql);
echo mysqli_num_rows($result)."<br>";
while($row = mysqli_fetch_assoc($result)){
    $destination = $row['foldername'].".zip";
}

$sql = "SELECT * FROM files WHERE folderid=".$folderid;
echo $sql."<br>";
$result = mysqli_query($conn,$sql);
//echo mysqli_num_rows($result);
$assoc = array();
while($row = mysqli_fetch_assoc($result)){
    $key = $row['fileid'];
    $val = $row['filename'];
    $assoc[$key] = $val;
}
print_r($assoc);
echo "<br>";


$zip = new ZipArchive();
if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
    return false;
}
echo $destination."<br>";
foreach($assoc as $key => $value){
    echo $key."<br>";
    $old = "../files/".$key;
    echo $old."<br>";
    if(file_exists($old)) {
        
        $zip->addFile($old,$value);
        echo $old."::".$value."<br>";
    }
}

$zip->close();
header('Content-Length: ' . filesize($destination)); 
header("Content-disposition: attachment; filename=\"$destination\"");
header('Content-type: application/zip');
readfile($destination);
unlink($destination);
?>
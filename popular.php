<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
$me = $_SESSION['userid'];
$imgsrc = "pp/".$me;
if(!file_exists($imgsrc)){
    $imgsrc = "pp.png";
}
$sql = "SELECT files.fileid, files.filename,folders.folderid, folders.foldername,    
    files.created,users.userid, users.username, COUNT(*) as stars
    FROM likes 
    INNER JOIN files ON files.fileid=likes.fileid 
    INNER JOIN users ON files.userid=users.userid
    INNER JOIN folders ON files.folderid=folders.folderid
    GROUP BY likes.fileid
    ORDER BY stars DESC";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Share Code | Personal</title>
    <link rel="stylesheet" type="text/css" href="styles/pstyle.css">
</head>

<body>
    <header class="personal_header">
        <a id="homelink" href="personal.php">Share Code</a>
        <form id="search" action="search.php">
            <input name="search" type="text" placeholder="Search on Share Code">
            <select name="soption" >
                <option value="username">username</option>
                <option value="title" >title</option>
            </select>
			<button type="submit" style="display:none;"></button>
        </form>
        <a id="logout" href="includes/logout.php"> Log Out </a>
        <a id="usernameh" href="personal.php">
            <img src="<?php echo $imgsrc;?>" height="25" width="25">
            <p id="usernamep">
                <?php echo $_SESSION['username']?> </p>
        </a>
        <a id="setting" href="setting.php">Settings</a>
        <a id="trend" href="popular.php"> Trending </a>
    </header>

    

    <div class="pmain_wrapper">
        

        <main class="pmain">
            
            <h1> Recent Popular Codes </h1>
            
            <div class="popular">
                <table style="text-align:center" >
                    <tr>
                        <th> title </th>
                        <th> created on </th>
                        <th> folder </th>
                        <th> author </th>
                        <th> download </th>
                        <th> stars </th>

                        <?php while($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                            <tr>
                                <td style="text-align:left" >
									
									<?php $filelink = "view.php?file=".$row['fileid'];
									?>
                                    <a href="<?php echo $filelink; ?>"><img src="icons/file.png" style="padding: 2px 5px;"> <?php echo $row['filename']?> </a>
                                </td>
                                <td>
                                    <?php 
                            
                            $time = strtotime($row['created']);
							$myFormatForView = date("m/d/y g:i A", $time);
							echo $myFormatForView;
	
                                    
                                    ?>
                                </td>
                                <td> <?php
									$folderlink = "user.php?id=".$row['userid']."&folderid=".$row['folderid'] ;
									
									
									?> 
									<a href="<?php echo $folderlink;?>"> <?php echo $row['foldername'];?> </a>
								</td>
								
                                <td>
									<?php $ulink="user.php?id=".$row['userid']?>
                                    <a href="<?php echo $ulink;?>"> <?php echo "@".$row['username']?> </a>

                                </td>
								
								<td>
									<?php $dlink = "includes/download.php?fileid=".$row['fileid'];
									?>
									<a href="<?php echo $dlink;?>"> download </a>
								</td>
								
                                <td> <?php echo $row['stars'];?> </td>
                            </tr>
                        <?php
                            }
                        ?>
                        
                </table>

            </div>
        </main>
    </div>


</body>

</html>
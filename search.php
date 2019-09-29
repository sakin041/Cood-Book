<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
$me = $_SESSION['userid'];
$imgsrc = "pp/".$me;
if(!file_exists($imgsrc)){
    $imgsrc = "pp.png";
}

$q = $_GET['search'];
$o = $_GET['soption'];

if($o=="username"){
	$sql = "SELECT * FROM users WHERE username LIKE '%$q%' AND userid!=$me";
}
elseif($o == "title"){
	$sql = "SELECT * FROM files INNER JOIN users ON files.userid=users.userid 
	INNER JOIN folders ON files.folderid=folders.folderid 
	WHERE filename LIKE '%$q%' AND users.userid!=$me";
	//echo $sql;
}

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Share Code | Search Users</title>
    <link rel="stylesheet" type="text/css" href="styles/pstyle.css">
</head>
<body> 
     <header class="personal_header">
        <a id="homelink" href="personal.php">Share COde</a>
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
    
        
    <div class="fileview_main_wrapper">
    
        <main class="smain">
            <h3> <?php echo "Search Results for '".$q."' in ".$o ;?> </h3>
			<?php if($o=="username"){?>
            <div class="followmain">
                
                <ul>
					<?php 
					
					while($row = mysqli_fetch_assoc($result)){
						$imglink = "pp/".$row['userid'];
						if(!file_exists($imglink)){
							$imglink = "pp.png";
						}
						$fullname = $row['firstname']." ".$row['lastname'];
						$plink = "user.php?id=".$row['userid'];
						$uname = $row['username'];
						$scity = $row['city'];
						$scon = $row['country'];
						
					?>
					
                    <li>
						<div class="followimg"><img src="<?php echo $imglink;?>" height="50" width="50">
							<div class="followinfo">
								<h5><?php echo $fullname;?></h5><a href="<?php echo $plink;?>"><?php echo $uname;?></a>
								<p><?php echo $scity.",".$scon;?></p>
							</div>
						</div>
					</li>
                    
            
            		<?php
						}
					}
					?>
            
                </ul>
            </div>
			<?php if($o=="title"){?>
			<div class="popular">
                <table style="text-align:center" >
                    <tr>
                        <th> title </th>
                        <th> folder </th>
                        <th> author </th>
                        <th> link </th>

                        <?php while($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                            <tr>
                                <td style="text-align:left" >
									
									<?php $filelink = "view.php?file=".$row['fileid'];
									?>
                                    <a href="<?php echo $filelink; ?>"><img src="icons/file.png" style="padding: 2px 5px;"> <?php echo $row['filename']?> </a>
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
								
                                
                            </tr>
                        <?php
                            }
								  }
                        ?>
                        
                </table>

            </div>
        </main>
    </div>
    
</body>
</html>

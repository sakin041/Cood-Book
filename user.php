<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
if(isset($_GET['id'])){
    $userid = $_GET['id'];
    $sql = "SELECT * FROM users WHERE userid=$userid;";
    $resultname = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultname);
    $usert = $row['username'];
    $firstt = $row['firstname'];
    $lastt = $row['lastname'];
    $cityt = $row['city'];
    $countryt = $row['country'];
    $me = $_SESSION['userid'];
 //   <!-------------------------follow toggle-------------------------->
    $sql= "SELECT * FROM follows WHERE follower=$me AND followed=$userid";
    $resultfl = mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($resultfl);
    if($numrow < 1){
        $fol = "follow";
    }
    else{
        $fol = "unfollow";
    }
  //  <!-------------------------like toggle-------------------------->
    function star($fid){
        include 'includes/config.php';
        $me = $_SESSION['userid'];
        $sql= "SELECT * FROM likes WHERE userid=$me AND fileid=$fid";
        $resultlk = mysqli_query($conn,$sql);
        $numrow = mysqli_num_rows($resultlk);
        if($numrow < 1){
            $star = "icons/unstar.png";
        }
        else{
            $star = "icons/star.png";
        }
        return $star;
    }
    
    if(isset($_GET['folderid'])){
        $folderid = $_GET['folderid'];
        $sql = "SELECT * FROM files where folderid=$folderid;";
        //echo $sql;
        $resultfile = mysqli_query($conn,$sql);
    }
    else{
        $sql = "SELECT * FROM folders where userid=$userid and category='public';";
        //echo $sql;
        $resultfolder = mysqli_query($conn,$sql);
    }
	
	$imgsrc = "pp/".$me;
	if(!file_exists($imgsrc)){
		$imgsrc = "pp.png";
	}
	
	$imgsrcu = "pp/".$userid;
	if(!file_exists($imgsrcu)){
		$imgsrcu = "pp.png";
	}
	
}
else{
	die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> Share Code | Personal</title>
    <link rel="stylesheet" type="text/css" href="styles/pstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/mstyle.css">
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

    <div class="info">
        <div class="info_photo">
            <img src="<?php echo $imgsrcu;?>" height="150" width="150">
        </div>
        <div class="info_details">
            <h2>
                <?php echo $firstt." ".$lastt  ?> </h2>
            <a href="personal.php">
                <?php echo "@".$usert; ?> </a>
            <p><?php echo $cityt.",".$countryt; ?></p>
        </div>
        <div class="info_social">
            <div class="info_socialf">
                <?php $fl= "follow.php?fr=".$me."&fd=".$userid ;?>
                <a href=<?php echo $fl;?> > <?php echo $fol; ?> </a> 
                
                </div>

        </div>
    </div>

    <div class="main_wrapper">
        

        <main class="main">
            <div class="repo_description">

            </div>

            <div class="repo">

                <?php 
					if(isset($_GET['folderid'])){
							// traverse in file view
				?>
                <!-------------------------------------------------------- FILE -------------------------------------------------------------------->
				
				<h3 style="margin-left:250px;"> <?php 
					$sql = "SELECT * FROM folders WHERE folderid=".$_GET['folderid'].";";
                            //echo $sql;
                            $result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_assoc($result);
						echo "Folder : ".$row['foldername'];
					?> 
				</h3>
				
                <table>

                    <tr>
                        <th> title </th>
                        <th> modified last on </th>
                        <th> stars </th>
                        <th> action </th>
                    </tr>
                    <?php

                            $result = $resultfile;
                            //echo mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <td>
                                <?php $ref = "view.php?file=".$row['fileid']; ?>
                                <img src="icons/file.png" style="padding: 2px 5px;">
                                <a href= "<?php echo $ref; ?>">  <?php echo $row['filename'];?> </a>
                            </td>
                            <td style="text-align:center">
                                <?php echo $row['created'];?>
                            </td>
                            <td>
                               <?php
                                    $starlink = "star.php?userid=".$_SESSION['userid']."&fileid=".$row['fileid']."&folderid=".$_GET['folderid']."&id=".$_GET['id'];
                                ?>
                                <a href=<?php echo $starlink;?> ><img src="<?php echo star($row['fileid']);?>" ></a>
                            </td>
                            <td style="text-align:center">
                                <div class="dropdown">
                                    <button onclick="myFunction(this)" class="dropbtn">Dropdown</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <?php $dlink = "includes/download.php?fileid=".$row['fileid']; ?>
                                        <a href= <?php echo $dlink; ?> > Download</a>
                                        
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <?php
                            }
                        ?>

             <!------------------------------------------------------------FOLDER---------------------------------------------------------------->


                </table>
                <?php
						}
					else{
							// traverse in folder view
				?>
                    <table>
                        <tr>
                            <th> title </th>
                            <th> modified last on </th>
                            <th> action </th>

                            <?php
                            
                            $result = $resultfolder; 
                            //echo mysqli_num_rows($result); 
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                                <tr>
                                    <td>
                                        <?php $ref = "user.php?id=".$userid."&folderid=".$row['folderid']; ?>
                                        <a href=<?php echo $ref;?> ><img src="icons/folder.png" style="padding: 2px 5px;"> <?php echo $row['foldername'];?> </a>
                                    </td>
                                    <td style="text-align:center">
                                        <?php echo $row['created'];?>
                                    </td>
                                    <td style="text-align:center">
                                        <div class="dropdown">
                                            <button onclick="myFunction(this)" class="dropbtn">Dropdown</button>
                                            <div id="myDropdown" class="dropdown-content">
                                               <?php $dzlink = "includes/dlzip.php?folder=".$row['folderid']; ?>
                                               <a href= <?php echo $dzlink; ?> > Download as zip</a>
                                                	
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                <?php
                            }
                        ?>
                    </table>

                    <?php
					}
				?>

            </div>
            <div id="modals">

                <div id="createfolder" class="modal">
                    <!-- Modal content for upload file button -->
                    <div class="modal-content">

                        <span onclick="folclose()" class="close">&times;</span>
                        <h2>Create a new folder</h2>
                        <form action="includes/newfolder.php" method="POST">
                            <input name="cat" type="text" value="public" style="display:none;">
                            <input id="renamefilename" name="foldername" type="text" style="width:200px">
                            <button type="submit" name="foldercreate"> Create </button>

                        </form>
                    </div>
                </div>

                <div id="uploadfile" class="modal">
                    <!-- Modal content for upload file button -->
                    <div class="modal-content">

                        <span onclick="upclose()" class="close">&times;</span>
                        <h2>Upload New Files</h2>
                        <form enctype="multipart/form-data" action="includes/newfile.php" method="POST">

                            <input class="file_input" type="file" name="filelist[]" multiple="multiple">
                            <select id="upselect" name="folderlst" class="moveselector">
                                <option selected disabled >select a folder</option>
                                <?php
                                    //<option>Huawei</option>
                                    //include_once 'includes/config.php';
                                    $us = $_SESSION['userid'];
                                    $sql = "SELECT * FROM folders WHERE userid=$us AND category='public';";
                                    $result = mysqli_query($conn,$sql);
                                    echo mysqli_num_rows($result);
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $row['folderid']?>" > <?php echo $row['foldername']?> </option>
                                        <?php
                                    }    
                                ?>
                            </select>
                            <button type="submit" name="upload"> upload </button>
                        </form>
                    </div>
                </div>

                <div id="renamefile" class="modal">
                    <!-- Modal content for upload file button -->
                    <div class="modal-content">
                        <span onclick="reclose()" class="close">&times;</span>
                        <h2>Rename File</h2>
                        <form action="test.html">
                            <input id="renamepk" name="pk" type="text" style="display:none;">
                            <input id="renamefilename" name="filename" type="text">
                            <button type="submit" name="upload"> rename </button>
                        </form>
                    </div>
                </div>

                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p id="modaltext">Some text in the Modal..</p>
                        <form action="test.html">
                            <select name="brands" class="moveselector">
                                <option >Huawei</option>
                                <option>Vivo</option>
                                <option>Oppo</option>
                                <option>Xiaomi</option>
                                </select>
                            <input id="movepk" name="pk" type="text" style="display:none;">
                            <input id="movebt" type="submit" value="move">
                        </form>
                    </div>

                </div>

            </div>
        </main>
    </div>

    <script src="scripts/modal.js">


    </script>

</body>

</html>

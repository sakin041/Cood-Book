<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Share Code | Personal</title>
    <link rel="stylesheet" type="text/css" href="styles/pstyle.css">
    <link rel="stylesheet" type="text/css" href="styles/mstyle.css">
</head>

<body>
    <header class="personal_header">
        <a id="homelink" href="personal.php">Share Code</a>
        <form id="search" action="search.php">
            <input name="search" type="text" placeholder="Search on Share Code">
            <select>
                <option value="username">username</option>
                <option>title</option>
            </select>
        </form>
        <a id="logout" href="index.php"> Log Out </a>
        <a id="usernameh" href="personal.php">
            <img src="pp.png" height="25" width="25">
            <p id="usernamep">
                <?php echo $_SESSION['username']?> </p>
        </a>
        <a id="setting" href="setting.php">Settings</a>
        <a id="trend" href="popular.html"> Trending </a>
    </header>

    <div class="info">
        <div class="info_photo">
            <img src="pp.png" height="150" width="150">
        </div>
        <div class="info_details">
            <h2>
                <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']  ?> </h2>
            <a href="personal.php">
                <?php echo "@".$_SESSION['username']; ?> </a>
            <p>
                <?php echo $_SESSION['mycity'].",".$_SESSION['mycon']; ?>
            </p>
        </div>
        <div class="info_social">
            <div class="info_socialf">
                <a href="followings.php">Followings</a><a href="followers.php">Followers</a> </div>

        </div>
    </div>

    <div class="main_wrapper">
        <div class="new_file">
            <a onclick="crfol()" style="cursor:pointer">New Folder</a>
            <a onclick="upfile()" style="cursor:pointer">Upload File</a>
            <a href="createfile.html">Create File</a>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="personal.php" id="current_nav">Public</a>
                </li>
                <li><a href="private.html">Private</a>
                </li>
                <li><a href="collection.html">Collection</a>
                </li>
            </ul>
        </nav>

        <main class="main">
            <div class="repo_description">

            </div>

            <div class="repo">

                <?php 
					if(isset($_GET['folderid'])){
							// traverse in file view
				?>
                <!-------------------------------------------------------- FILE -------------------------------------------------------------------->
                <table>

                    <tr>
                        <th> title </th>
                        <th> modified last on </th>
                        <th> action </th>
                    </tr>
                    <?php
                            $us = $_SESSION['userid'];
                            $sql = "SELECT * FROM files WHERE folderid=".$_GET['folderid']." AND userid=".$_SESSION['userid'].";";
                            echo $sql;
                            $result = mysqli_query($conn,$sql);
                            echo mysqli_num_rows($result);
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
                            <td style="text-align:center">
                                <div class="dropdown">
                                    <button onclick="myFunction(this)" class="dropbtn">Dropdown</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <?php $dlink = "includes/download.php?fileid=".$row['fileid']; ?>
                                        <a href= <?php echo $dlink; ?> > Download</a>
                                        
                                        <a onclick="refile( '<?php echo $row['fileid'];?>' , '<?php echo $row['filename'];?>' )">rename</a>
                                        <a onclick="move( <?php echo $row['fileid'];?> ,this,'copy')">copy  </a>
                                        <a onclick="move( <?php echo $row['fileid'];?> ,this,'delete')">delete  </a>
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
                            $us = $_SESSION['userid'];
                            $sql = "SELECT * FROM folders WHERE userid=$us AND category='public';";
                            $result = mysqli_query($conn,$sql); echo mysqli_num_rows($result); while($row = mysqli_fetch_assoc($result)){
                        ?>

                                <tr>
                                    <td>
                                        <?php $ref = "personal.php?folderid=".$row['folderid']; ?>
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
                                                <a onclick="refile( '<?php echo $row['folderid'];?>' , '<?php echo $row['foldername'];?>' )">rename</a>
                                                <a onclick="move( <?php echo $row['folderid'];?> ,this,'copy')">copy  </a>
                                                <a onclick="move( <?php echo $row['folderid'];?> ,this,'delete')">delete  </a>
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

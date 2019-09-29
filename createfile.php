<?php session_start();
//include_once 'includes/methods.php';
include 'includes/config.php';
if(isset($_GET['cat'])){
    $me = $_SESSION['username'];
    $cat = $_GET['cat'];
	$imgsrc = "pp/".$_SESSION['userid'];
	if(!file_exists($imgsrc)){
		$imgsrc = "pp.png";
	}
}
else{
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Code</title>
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


    <div class="edit_main_wrapper">

        <main class="edit_main">
            <div class="repo_description">

            </div>
            <div class="repo">
                <div class="editform">
                    <form action="includes/create.php" method="POST">
                        <input name="pathwithfile" type="text" style="display:none;" value="../user/stereotyped/439 - Knight Moves.cpp">
                        <input name="title" type="text" placeholder="file_tile.cpp">
                        <button name="cancel">cancel</button>
                        <button name="save" type="submit">save</button>
                        
                        <select id="upselect" name="folderlst" class="moveselector">
                                <option selected disabled >select a folder</option>
                                <?php
                                    //<option>Huawei</option>
                                    //include_once 'includes/config.php';
                                    $us = $_SESSION['userid'];
                                    $sql = "SELECT * FROM folders WHERE userid=$us AND category='$cat';";
                                    
                                    $result = mysqli_query($conn,$sql);
                                    echo mysqli_num_rows($result);
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $row['folderid']?>" > <?php echo $row['foldername']?> </option>
                                        <?php
                                    }    
                                ?>
                            </select>
                        
                        <textarea name="code">
#include <bits/stdc++.h>

int main()
{
    // write your code....
    
    return 0;

}

                        </textarea>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
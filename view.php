<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
if(isset($_GET['file'])){
    $fileid = $_GET['file'];
    $path = "files/".$fileid;
	
	$me = $_SESSION['userid'];
	$imgsrc = "pp/".$me;
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
    <title>Share Code | View Code</title>
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


    <div class="fileview_main_wrapper">

        <main class="main">
            <div class="repo_description">

            </div>
            <div class="repo">
                <div class="fileview_action">
                    <h3>
                        <?php 
                        $us = $_SESSION['userid'];
                            $sql = "SELECT * FROM files WHERE fileid=".$_GET['file'].";";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo $row['filename'];
                            }
                        ?>
                        

                    </h3>
                    <h4 style="margin-top: 12px">author: 
						<?php
							$sql = "SELECT * FROM files INNER JOIN users ON users.userid=files.userid 
							WHERE fileid=".$_GET['file'];
						//echo $sql;
						$res = mysqli_query($conn,$sql);
						$row = mysqli_fetch_assoc($res);
						echo $row['firstname']." ".$row['lastname'];
						?>
					</h4>
                </div>

            </div>
            <pre class='precode'><?php echo htmlentities(file_get_contents($path));?></pre>
        </main>
    </div>


</body>

</html>

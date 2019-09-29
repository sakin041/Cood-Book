<?php session_start();
//include_once 'includes/methods.php';
include_once 'includes/config.php';
$me = $_SESSION['userid'];
$sql= "SELECT * FROM follows INNER JOIN users ON follows.follower=users.userid WHERE followed=$me ";
$resultfrlist = mysqli_query($conn,$sql);
$numfrlist = mysqli_num_rows($resultfrlist);

$imgsrc = "pp/".$me;
if(!file_exists($imgsrc)){
    $imgsrc = "pp.png";
}

$sql= "SELECT * FROM follows INNER JOIN users ON follows.follower=users.userid WHERE followed=$me ";
$esultfrlist = mysqli_query($conn,$sql);
$numofr = mysqli_num_rows($esultfrlist);
$sql= "SELECT * FROM follows INNER JOIN users ON follows.followed=users.userid WHERE follower=$me ";
$sultfrlist = mysqli_query($conn,$sql);
$numog = mysqli_num_rows($sultfrlist);


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
            <img src="<?php echo $imgsrc;?>" height="150" width="150">
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
                <a href="followings.php"><?php echo $numog." ";?>Followings</a>
				<a href="#" style="cursor:not-allowed;"><?php echo $numofr." ";?>Followers</a> </div>

        </div>
    </div>

    <div class="main_wrapper">


        <main class="main">

            <div class="followmain">
                <ul>
                   <?php
                        while($row = mysqli_fetch_assoc($resultfrlist)){
                          $imgf = "pp/".$row['userid'];
							if(!file_exists($imgf)){
								$imgf = "pp.png";
							}
                    ?>
                    <li>
                        <div class="followimg"><img src="<?php echo $imgf; ?>" height="50" width="50">
                            <div class="followinfo">
                                <h5><?php echo $row['firstname']." ".$row['lastname'];?></h5>
                                <?php $relink="user.php?id=".$row['userid']; ?>
                                <a href= <?php echo $relink; ?> > <?php echo $row['username'];?>  </a>
                                <p> <?php echo $row['city'].",".$row['country']?> </p>
                            </div>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>

        </main>
    </div>


</body>

</html>

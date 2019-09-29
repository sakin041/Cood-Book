<?php 
    session_start();
    //include_once 'includes/methods.php';
    include_once 'includes/config.php';
    $me = $_SESSION['userid'];
    $sql = "SELECT * FROM users WHERE userid=$me";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

$imgsrc = "pp/".$me;
if(!file_exists($imgsrc)){
    $imgsrc = "pp.png";
}
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
        <a id="logout" href="logout.php"> Log Out </a>
        <a id="usernameh" href="personal.php">
            <img src="<?php echo $imgsrc;?>" height="25" width="25">
            <p id="usernamep"><?php echo $_SESSION['username']?> </p>
        </a>
        <a id="setting" href="setting.php">Settings</a>
        <a id="trend" href="popular.php"> Trending </a>
    </header>


    <div>

        <div class="changeselect">

            <a class="changecurrent" href="#"> Change Password </a>
            <a href="setting.php"> Change Information </a>
        </div>


        <form class="settings_form_p" method="post" action="includes/settingformpass.php">

            <fieldset>
                <legend>Change Password</legend>
                <h6>Old Password</h6>
                <input type="password" name="oldp">
                <h6>New Password</h6>
                <input type="password" name="newp">
                <h6>Confirm New Password</h6>
                <input type="password" name="newpc">
            </fieldset>

            <fieldset style="border:none;">
                <button type="submit"  name="savep">Save</button>
                <button type="submit" name="cancel">Cancel</button>
            </fieldset>

        </form>

    </div>



</body>

</html>
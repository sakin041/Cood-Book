<?php session_start();
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
    <title>Share Code | Setting</title>
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

            <a href="changepass.php"> Change Password </a>
            <a class="changecurrent" href="setting.php"> Change Information </a> </div>


        <form class="settings_form" action="includes/settingform.php" method="POST" enctype="multipart/form-data">

            <fieldset>
                <legend>Personal Information</legend>
                <h6>First Name</h6>
                <input name="sfname" type="text" placeholder="First Name" value="<?php echo $row['firstname'];?>">
                <h6>Last Name</h6>
                <input name="slname" type="text" placeholder="Last Name" value= "<?php echo $row['lastname'];?>" >
                <h6>Date of Birth</h6>
                <input name="sdob" type="date" placeholder="yyyy-mm-dd" value="<?php echo $row['dob'];?>">
                <h6>Gender</h6>
                <input class="radio" type="radio" name="gender" value="male" <?php if($row['gender']!='female') echo "checked"; ?> >Male
                <input class="radio" type="radio" name="gender" value="female" <?php if($row['gender']=='female') echo "checked"; ?> >Female
                <h6>Profile Picture</h6>
                <img src="<?php echo $imgsrc?>" height="150" width="150">
                <h6><input name="spp" id="ppinput" type="file"></h6>
            </fieldset>

            <fieldset>
                <legend>Contact Information</legend>
                <h6>Email</h6>
                <input name="semail" type="email" placeholder="you@domain.com" value="<?php echo $row['email'];?>" >
                <h6>URL</h6>
                <input name="surl" type="url" placeholder="www.yourdomain.com" value="<?php echo $row['url'];?>" >
                <h6>City</h6>
                <input name="scity" type="text" placeholder="Dhaka" value="<?php echo $row['city'];?>">
                <h6>Country</h6>
                <input name="scountry" type="text" placeholder="Bangladesh" value="<?php echo $row['country'];?>">
            </fieldset>

            <fieldset>
                <legend>Work Information</legend>
                <h6>Company</h6>
                <input name="scompany" type="text" placeholder="LocalStaffing LLC" value="<?php echo $row['company'];?>">
                <h6>Post</h6>
                <input name="spost" type="text" placeholder="Full Stack Developer" value="<?php echo $row['post'];?>">
            </fieldset>
            <fieldset style="border:none;">
                <button name="ssave" type="submit">Save</button>
                <button name="scancel" type="submit">Cancel</button>
            </fieldset>

        </form>

    </div>



</body>

</html>
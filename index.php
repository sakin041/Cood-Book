<!DOCTYPE html>
<html>

<head>
    <title>Share Code</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <nav>
            <div class="home">
                <a href="index.html">Share Code</a>
            </div>
            <div class="login">
                <form action="includes/login.php" method="post">
                    <input name="username" placeholder="username" type="text">
                    <input name="password" placeholder="password" type="password">
                    <button name="login" type="submit">Login</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="intro" data-brackets-id='189'>
        <h2>Share Code</h2>
        <h3>Brings all your codes in one place</h3>
        <h4>Share Code is code storage and sharing platform</h4>
        <ul>
            <li>upload & download codes</li>
            <li>organise codes into folders</li>
            <li>view codes online</li>
            <li>make codes public or keep them private</li>
            <li>follow other users profile</li>
            <li>explore popular codes on codecrunch</li>
            <li>take your favorite codes in your collection</li>
        </ul>
    </div>
    <div class="signup">
        <h1>Join Share Code Today</h1>
        <form action="includes/signup.php" method="post">
            <form>
                <input name="firstname" placeholder="firstname" type="text">
                <input name="lastname" placeholder="lastname" type="text">
                <br>
                <input name="email" placeholder="email" type="text">
                <br>
                <input name="username" placeholder="username" type="text">
                <br>
                <input name="password" placeholder="password" type="password">
                <br>
                <button name="signup" type="submit">Sign Up</button>
            </form>
        </form>
    </div>
    
</body>

</html>
<?php
session_start();

if (isset($_SESSION['user']))   // Checking whether the session is already there or not 
{
    header("Location:cms_guestbook.php");
}

if (isset($_POST['login']))   // checking whether the user clicked login button or not 
{
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    if ($user == "root" && $pass == "secret123")  // username is  set to "root"  and Password "secret123"
    {
        $_SESSION['user'] = $user;
        header("Location:cms_guestbook.php");
    } else {
        echo "Invalid username or password. Try again.";
    }
}
?>

<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/login_style.css">
</head>

<body>
    <form method="post">
        <div class="login-box">
            <h2>Login</h2>
            <form>
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="pass" required="">
                    <label>Password</label>
                </div>
                <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" name="login" value="LOGIN">
                </a>
            </form>
        </div>
    </form>
</body>

</html>
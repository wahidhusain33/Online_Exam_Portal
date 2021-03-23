<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>

<body>
    <?php include_once 'layout/header.php';?>

    <form action="" method="POST" id="loginform">
    <div class="heading">
    <h2>Login Form</h2>
    </div>
    
        <div class="container1">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="pass" required>

            <input type="button" id="login" value="Login">
        </div>
        <div id="con1" style="background-color:#f1f1f1">
            <span class="psw">Forgot <a href="forgetpassword.php">password?</a></span>
        </div>
    </form>
    <?php include_once 'layout/footer.php';?>
    <script src="assets/js/snake.js"></script>

</body>

</html>
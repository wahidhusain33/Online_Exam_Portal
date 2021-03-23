<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <?php include_once 'layout/header.php'; ?>

    <form action="" method="POST">
        <div class="container">
            <div class="heading">
            <h2>Exam Registeration</h2>
            </div>
            <hr>
            <label for="name"><b>Name</b></label><br>
            <input type="text" placeholder="Enter Name" name="name" id="name" required><br>

            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter Email" name="email" id="email" required><br>

            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required><br>

            <label for="psw-repeat"><b>Repeat Password</b></label><br>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required><br>
            <label for="mobile"><b>Mobile</b></label><br>
            <input type="number" placeholder="Enter Mobile" name="mobile" id="mobile" required><br>
            <hr>
            <input type="submit" class="registerbtn" id="register">
        </div>

        <div class="container signin">
            <p id="para">Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form>

    <?php include_once 'layout/footer.php';?>
    <script src="assets/js/snake.js"></script>
</body>

</html>
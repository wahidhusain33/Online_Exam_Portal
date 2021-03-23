<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once 'layout/header.php'; ?>

    <div id="forgetCon">
        <input type="email" id="email_id" placeholder="Enter Email"><br>
        <input type="submit" name="otp" id="otp" value="Get an OTP"><br>
        <input type="number" name="otpval" id="otpval" placeholder="Enter OTP recieved" style="display: none;"><br>
        <input type="submit" name="otpverify" id="otpverify" value="Verify" style="display: none;"><br>
        <input type="password" name="newpass" id="newpass" placeholder="Enter New Password" style="display: none;"><br>
        <input type="password" name="newpass2" id="newpass2" placeholder="Enter Password again" style="display: none;"><br>
        <input type="submit" name="set" id="set" value="Set Password" style="display: none;">
    </div>

    <?php include_once 'layout/footer.php'; ?>
    <script src="assets/js/snake.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once 'layout/header.php'; ?>
    <div class="condiv">
        <div id="div1">
        <a href="addQues.php"><input type="submit" name="addques" id="addques" value="Add Question"></a>
        </div>
        <div id="div2">
        <a href="addSub.php"><input type="submit" name="addsub" id="addsub" value="Add Subject"></a>
        </div>
    </div>
    <?php include_once 'layout/footer.php'; ?>
    <script src="../assets/js/snake.js"></script>
</body>
</html>
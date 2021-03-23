<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<?php include_once 'layout/header.php'; ?>

<div id="addQues">
    <div id="addQues2">
        <input type="text" name="nameOfsub" id="nameOfsub" placeholder="Subject Name" required>
        <input type="text" name="questionToBe" id="questionToBe" placeholder="Question" required>
        <input type="text" name="opt1" id="opt1" placeholder="Option-1" required>
        <input type="text" name="opt2" id="opt2" placeholder="Option-2" required>
        <input type="text" name="opt3" id="opt3" placeholder="Option-3" required>
        <input type="text" name="correct" id="correct" placeholder="Correct Option" required>
        <input type="button" name="addQuesButton" id="addQuesButton" value="Add">
    </div>
</div>

<?php include_once 'layout/footer.php'; ?>
    <script src="../assets/js/snake.js"></script>
</body>
</html>
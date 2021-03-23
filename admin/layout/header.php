<?php
session_start();
if(!isset($_SESSION['admin']['admin_id']) || ($_SESSION['admin']['is_admin'])!=1){
  die('You cannot access');
}
?>
<header>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="addQues.php">Add Ques</a>
        <a href="addSub.php">Add Sub</a>
        <a href="logout.php">Logout</a>
    </div>
</header>
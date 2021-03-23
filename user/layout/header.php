<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 0 ) {
die("You can not access !");
}
?>


<header>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="#">Previous Results</a>
        <a href="logout.php">Logout</a>
    </div>
</header>
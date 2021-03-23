<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 0 ) {
die("You can not access !");
}
?>

<?php
session_start();
if(!isset($_SESSION['admin']['admin_id']) || ($_SESSION['admin']['is_admin'])!=1){
  die('You cannot access');
}
?>
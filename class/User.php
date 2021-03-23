<?php

session_start();

include_once 'Db_con.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

class User extends Db_con
{

    public $name;
    public $email;
    public $psw;
    public $dateofsignup;
    public $mobile;
    public $is_admin;
    function __construct()
    {
        $db = new Db_con();
        $this->conn = $db->conn;
    }
    function signup($name, $email, $psw, $mobile)
    {
        $this->name = $name;
        $this->email = $email;
        $this->psw = $psw;
        $this->mobile = $mobile;

        $sql = "INSERT INTO `tbl_user`(`name`,`email`,`password`,`dateofsignup`,`mobile`,`is_admin`)
        VALUES('$this->name','$this->email','$this->psw',now(),'$this->mobile','0')";

        $data = $this->conn->query($sql);

        if ($data == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    function login($email, $pass)
    {
        $this->email = $email;
        $this->pass = md5($pass);

        $sql = "SELECT * FROM `tbl_user` WHERE `email`='$this->email' AND `password`='$pass'";
        $result = $this->conn->query($sql);
        // print_r($result);
        if ($result->num_rows > 0) {
            $users = $result->fetch_assoc();
            if ($users['is_admin'] == 1) {
                $_SESSION['admin']['name'] = $users['name'];
                $_SESSION['admin']['email'] = $users['email'];
                $_SESSION['admin']['mobile'] = $users['mobile'];
                $_SESSION['admin']['is_admin'] = $users['is_admin'];
                $_SESSION['admin']['admin_id'] = $users['user_id'];
                return 1;
            } else if ($users['is_admin'] == 0) {
                $_SESSION['user']['name'] = $users['name'];
                $_SESSION['user']['email'] = $users['email'];
                $_SESSION['user']['mobile'] = $users['mobile'];
                $_SESSION['user']['is_admin'] = $users['is_admin'];
                $_SESSION['user']['user_id'] = $users['user_id'];
                return 0;
            } else {
                return -1;
            }
        }
    }

    function sendOtp($email)
    {
        $sql = "SELECT `email` FROM `tbl_user` WHERE `email`='$email'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'wahidhusain33@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = 'password20'; // Gmail address Password
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $otp = rand(100, 999);
            $_SESSION['otp'] = $otp;
            // echo $_SESSION['otp'];

            $mail->isHTML(true);
            $mail->setFrom($email);

            $mail->addAddress($email);
            $mail->Subject = ("$email");
            $mail->Body = "OTP :" . $otp;
            $mail->send();

            if ($mail->send()) {
                return(1);
            }
            else{
                return 0;
            }
        }
    }

    function otpVerification($otpval){
        $otp=$_SESSION['otp'];
        if($otpval==$otp){
            return 1;
        }
        else{
            return 0;
        }
    }
    function setPass($newpass,$email){
        $sql="UPDATE `tbl_user` SET `password` = '$newpass' WHERE `email`='$email'";
        $result=$this->conn->query($sql);
        if($result==TRUE){
            return 1;
        }
        else{
            return 0;
        }
    }
}

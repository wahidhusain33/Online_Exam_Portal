<?php
include_once '../class/User.php';
include_once '../class/Question.php';
include_once '../class/Subject.php';
include_once '../class/Result.php';
$action = $_POST['action'];

switch ($action) {
    case 'signup':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        $mobile = $_POST['mobile'];
        $obj = new User();
        $conn = $obj->signup($name, $email, $psw, $mobile);
        echo $conn;
        break;

    case 'login':
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $obj = new User();
        $conn = $obj->login($email, $pass);
        echo $conn;
        break;

    case 'otp':
        $email = $_POST['email'];
        $obj = new User();
        $otp = $obj->sendOtp($email);
        echo $otp;
        break;

    case 'otpverify':
        $otpval = $_POST['otpval'];
        $obj = new User();
        $otp = $obj->otpVerification($otpval);
        echo $otp;
        break;

    case 'setPass':
        $newpass = $_POST['newpass'];
        $email = $_POST['email'];
        $obj = new User();
        $otp = $obj->setPass($newpass, $email);
        echo $otp;
        break;


    case 'subject':
        $obj = new Subject();
        $php = $obj->quizName();
        $php1 = json_encode($php);
        echo $php1;
        break;

    case 'AddSub':
        $subName = $_POST['subName'];
        $obj = new Subject();
        $obj1 = $obj->addSub($subName);
        echo $obj1;
        break;

    case 'addQues':
        $sub = $_POST['subName'];
        $ques = $_POST['ques'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $cor = $_POST['cor'];
        $obj = new Question();
        $obj1 = $obj->addQues($sub, $ques, $opt1, $opt2, $opt3, $cor);
        echo $obj1;
        break;
    case 'phpQuiz':
        $sub_id = $_POST['sub_id'];
        $obj = new Question();
        $php = $obj->phpQuiz($sub_id);
        $php1 = json_encode($php);
        echo $php1;
        break;

    case 'quizDetail':
        $obj = new Subject();
        $obj1 = $obj->quizDetail();
        $obj2 = json_encode($obj1);
        echo $obj2;
        break;

    case 'masterQuiz':
        $sub_id = $_POST['sub_id'];
        $obj = new Question();
        $obj1 = $obj->masterQuiz($sub_id);
        $obj2 = json_encode($obj1);
        echo $obj2;
        break;

    case 'quizMaster':
        $obj = new Question();
        $obj1 = $obj->quizMaster();
        $obj2 = json_encode($obj1);
        echo $obj2;
        break;

    case 'result':
        $arrKey=[];
        $arrVal=[];
        foreach($_POST as $key=>$val){
            if($key=='action'){
                continue;
            }
            else{
                $arrKey[]=$key;
                $arrVal[]=$val;
            }
        }
        $obj = new Result();
        $obj1 = $obj->result($arrKey,$arrVal);
        echo $obj1;
        break;

}

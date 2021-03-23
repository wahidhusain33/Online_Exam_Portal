<?php

include_once 'Db_con.php';

class Question extends Db_con
{

    public $ques_id;
    public $question;
    public $op1;
    public $op2;
    public $op3;
    public $correct;
    public $subject_id;

    function __construct()
    {
        $db = new Db_con();
        $this->conn = $db->conn;
    }

    function addQues($sub,$ques,$opt1,$opt2,$opt3,$cor){
        $res=[];
        $id=0;
        $sql1="SELECT `subject_id` FROM `tbl_subject` WHERE `name`='$sub'";
        $result=$this->conn->query($sql1);
        // print_r($res);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
        }
        // print_r($res);

        foreach($res as $key=>$val){
            foreach($val as $key1=>$val1){
                $id=$val1;
            }
        }
        // print_r($id);

        $sql="INSERT INTO `tbl_question` (`question`,`op1`,`op2`,`op3`,`correct`,`subject_id`) VALUES('$ques','$opt1','$opt2','$opt3','$cor','$id')";
        echo $sql;
        $result=$this->conn->query($sql);
        if($result==TRUE){
            return 1;
        }
        else{
            return 0;
        }
    }





    function phpQuiz($sub_id){
        $res = array();
        $sql="SELECT DISTINCT(`ques_id`), `question`, `op1`, `op2`, `op3` FROM `tbl_question` WHERE `subject_id` = '$sub_id' ORDER BY RAND() LIMIT 3";

        $result=$this->conn->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $res[] = $row;
            }
            return $res;
        } else {
            return 0;
        }

    }
    function masterQuiz($sub_id){
        $res=[];
        $_SESSION['subject_id']=$sub_id;
        $sql="SELECT * FROM `tbl_question` WHERE `subject_id`=$sub_id";
        $result=$this->conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        }
        else{
            return 0;
        }
    }
    function quizMaster(){
        $res=[];
        $sub_id=$_SESSION['subject_id'];
        $sql="SELECT DISTINCT(`ques_id`), `question`, `op1`, `op2`, `op3` FROM `tbl_question` WHERE `subject_id` = '$sub_id' ORDER BY RAND() LIMIT 5";
        $result=$this->conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        }
        else{
            return 0;
        }
    }
}
    
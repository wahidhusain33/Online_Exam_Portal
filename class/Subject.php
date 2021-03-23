<?php

include_once 'Db_con.php';

class Subject extends Db_con
{

    public $sub_name;
    public $sub_id;
    function __construct()
    {
        $db = new Db_con();
        $this->conn = $db->conn;
    }

    function quizName(){
        $res=array();
        $sql="SELECT * FROM `tbl_subject`";
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
    function addSub($subName){
        $sql="INSERT INTO `tbl_subject`(`name`) VALUES('$subName')";
        if($this->conn->query($sql)==TRUE){
            return 1;
        }
        else{
            return 0;
        }
    }

    function quizDetail(){
        $res=[];
        $sql="SELECT * FROM `tbl_subject`";
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
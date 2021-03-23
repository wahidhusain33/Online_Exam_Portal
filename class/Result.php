<?php 
include_once "Db_con.php";

class Result extends Db_con{
    function __construct()
    {
        $db = new Db_con();
        $this->conn = $db->conn;
    }
    function result($arrKey,$arrVal){
       $arrMerge= array_combine($arrKey,$arrVal);
        $count=0;
        foreach($arrMerge as $key=>$val){
            $sql="SELECT * FROM `tbl_question` WHERE `ques_id`='$key' AND `correct`='$val'";
            $result=$this->conn->query($sql);
            if($result->num_rows > 0){
                $count++;
            }
        }
        $_SESSION['marks']=$count;
        if($count > 0){
            return $count;
        }
        else{
            return 0;
        }
    }
    
}
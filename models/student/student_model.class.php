<?php

//back end student php file
//gets semesters and returns as a xml object for every semester for that student previous and current
//include('../base/dbconnection.class.php');


class studentModel{
       
    private $ucid = "";
    private $connection = "";
    public $studentData = "";
    public function __construct(Database $db,$session_ucid)
    {

       
       $this->connection = $db->getDatabaseConnection();
       if($this->connection)
       {
              $this->ucid=$session_ucid;
              $result = mysqli_query($this->connection,"SELECT * FROM enrolled WHERE ucid='".$this->ucid."'");
              $result_row = $result->fetch_object();
              $num_rows = mysqli_num_rows($result);
              $d = json_encode($result_row);
              $this->setStudentData($d);
       
       }else{
        echo("connection error");
       }
       
       

    }
    public function setStudentData($data)
    {
       $this->studentData = $data;
    }
    
    public function getStudentData()
    {
        try{return $this->studentData;}
        catch(Exception $e){echo ($e->getMessage());}
    }
    public function setUCID($u)
    {
       $this->ucid=$u;
    }
}




?>
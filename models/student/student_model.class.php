<?php

//back end student php file
//gets semesters and returns as a xml object for every semester for that student previous and current
//include('../base/dbconnection.class.php');


class studentModel{
       
    private $ucid = "";
    private $connection = "";
    public $studentData = "";
    public $crnArr = array();
    public $courseArr = array();
    public $courseNames = array();
    public function __construct(Database $db,$session_ucid)
    {

       
       $this->connection = $db->getDatabaseConnection();
       if($this->connection)
       {
              $this->ucid=$session_ucid;
              $result = mysqli_query($this->connection,"SELECT * FROM enrolled WHERE ucid='".$this->ucid."'");
              while($row = mysqli_fetch_array($result))
              {
                $crnArr[] = $row['crn'];
              }
              
              //echo json_encode($crnArr);
              //$num_rows = mysqli_num_rows($result);
              //$d = json_encode($result_row);
              //echo ("hello");
              //$this->setStudentData($d);
              //
              
              foreach($crnArr as $value){//makes an array with crn numbers
                $result = mysqli_query($this->connection,"SELECT courseid FROM sections WHERE crn='".$value."'");
                while($row = mysqli_fetch_array($result))
              {
                $courseArr[] = $row['courseid'];
              }
              }
              
              foreach($courseArr as $value){
            $q_cname = "SELECT coursename FROM course WHERE courseid = '".$value."'";
            $result = mysqli_query($this->connection,$q_cname);
            while($row = mysqli_fetch_array($result))
              {
                $courseNames[] = $row['coursename'];
              }
              echo(json_encode($this->courseNames));
            }
              
       }else{
        echo("connection error");
       }
       
       

    }
    public function setStudentData($data)
    {
       $this->studentData = $data;
    }
    public function getCourses()
    {
        return $this->courseNames;
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
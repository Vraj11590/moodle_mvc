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
              $row = $this->connection->query("SELECT * FROM enrolled WHERE ucid='".$session_ucid."';");
              $num = mysql_num_rows($row);
              echo($num);
              //if($row->num_rows > 1)
              //{
              //  $result = $row->fetch_object();
              // 
              //  echo($num);   
              //}
              //else{
              //  echo("some error");
              //}
              //
              
              //$semester = $result->semester;
              //$cname = $result->cname;
              //$section = $result->section;
              //$grade = $result->grade;
              //$active = $result->active;
              //
              //$data = array($semester,$section,$cname,$grade,$active);
              //
              //$d = json_encode($data);
              //$this->setStudentData($d);
       
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
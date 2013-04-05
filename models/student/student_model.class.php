<?php

//back end student php file
//gets semesters and returns as a xml object for every semester for that student previous and current
//include('../base/dbconnection.class.php');


class studentModel{
       
    private $ucid = "";
    private $connection = "";
    public $studentData;
    public function __construct(Database $db)
    {
       
       $this->connection = $db->getDatabaseConnection();
       if($this->connection)
       {
              $q = $this->connection->query("SELECT * FROM enrolled WHERE ucid ='".$this->ucid."';");
              $result = $q->fetch_object();
              
              $semester = $result->semester;
              $cname = $result->cname;
              $section = $result->section;
              $grade = $result->grade;
              $active = $result->active;
              
              $data = array($semester,$section,$cname,$grade,$active);
              
              $studentData = json_encode($data);
              $this->setStudentData($studentData);
       
       }
       
       

    }
    public function setStudentData($data)
    {
       $this->studentData = $data;
    }
    
    public function getStudentData($studentData)
    {
        return $studentData;
    }
    public function setUCID($u)
    {
       $this->ucid=$u;
    }
}




?>
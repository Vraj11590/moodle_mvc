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
       //set globals
        $this->connection = $db->getDatabaseConnection();
        $this->ucid = $session_ucid;
       
       

    }
    public function setStudentData($data)
    {
       $this->studentData = $data;
    }
    public function getCourses()
    {
        $count= 0;
       if($this->connection)
       {
              $result = mysqli_query($this->connection,"SELECT * FROM enrolled WHERE ucid='".$this->ucid."'");
              while($row = mysqli_fetch_array($result))
              {
                $crnArr[] = $row['crn'];
              }
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
                $count = $count +1 ;
                global $courseNames;
                $courseNames[] = array($count => $row['coursename']);
                
                //$courseNames[] = $row['coursename'];
              }
              
            }
            //echo $courseNames[];
            echo json_encode($courseNames);
            
            //return json_encode($courseNames);
              
       }else{
        echo("connection error");
       }
    }
    
    public function getSemester(){
        
    }
    
    
    
    
    public function getStudentData()
    {
        try{return $this->studentData;}
        catch(Exception $e){echo ($e->getMessage());}
    }
    
}


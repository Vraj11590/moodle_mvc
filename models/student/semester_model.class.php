<?php

//
//
//class studentModel{
//       
//  private $ucid = "";
//  private $connection = "";
//  public $studentData = "";
//    
//  public $element_array[]= array();
//
//	
//    
//    
//    public function __construct(Database $db,$session_ucid)
//    {
//       //set globals
//        $this->connection = $db->getDatabaseConnection();
//        $this->ucid = $session_ucid;
//    }
//    public function getSemesterData($ucid)
//    {
//      echo("hello");
//      
////       $count= 0;
////       if($this->connection)
////       {
////				$result = mysqli_query($this->connection,"SELECT DISTINCT s.semesterid AS semesterid
////														  FROM sections AS s, enrolled AS e
////														  WHERE e.crn = s.crn
////														  AND e.ucid =  '".$this->ucid."'");
////              while($row = mysqli_fetch_array($result))
////              {
////                $semesterid[] = $row['semesterid'];
////              }
////              foreach($semesterid as $value){//makes an array with crn numbers
////                $result = mysqli_query($this->connection,"SELECT e.ucid as studentid,
////														         c.courseid AS courseid, c.coursename AS coursename,
////															     s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
////																 u.name AS teachername
////														  FROM sections AS s, enrolled AS e, courses AS c, users AS u
////														  WHERE e.ucid = '".$this->ucid."'
////														    AND s.semesterid = '".$value."'
////														    AND e.crn = s.crn
////														    AND s.courseid = c.courseid
////															AND s.teacherid = u.ucid");
////                while($row = mysqli_fetch_array($result))
////              {     
////					$element_array[] = array( 'field' => 'courseid', 'value' => $row['courseid'] );
////					$element_array[] = array( 'field' => 'coursename', 'value' =>$row['coursename'] );
////					$element_array[] = array( 'field' => 'crn', 'value' =>$row['crn'] );
////					$element_array[] = array( 'field' => 'sectionid', 'value' =>$row['sectionid'] );
////					$element_array[] = array( 'field' => 'teacher', 'value' =>$row['teacher'] );
////				}
////              }
////            //echo $courseNames[];
////            echo json_encode($element_array);
////
////            //return json_encode($courseName);
////              
////       }else{
////        echo("connection error");
////       }
//    }
//  public function getStudentData()
//    {
//        try{return $this->studentData;}
//        catch(Exception $e){echo ($e->getMessage());}
//    }
//
//	
//	
//    
//}
?>


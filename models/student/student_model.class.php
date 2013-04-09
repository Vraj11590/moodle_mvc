<?php

//back end student php file
//gets semesters and returns as a xml object for every semester for that student previous and current
//include('../base/dbconnection.class.php');


class studentModel{
       
    private $ucid = "";
    private $connection = "";
    public $studentData = "";
    public $element_array = array();

    public function __construct(Database $db)
    {
       //set globals
        $this->connection = $db->getDatabaseConnection();
    }

    public function getSemesterData($ucid)
    {
       $this->ucid=$ucid;
       if($this->connection)
       {
				$result = mysqli_query($this->connection,"SELECT DISTINCT s.semesterid AS semesterid
														  FROM sections AS s, enrolled AS e
														  WHERE e.crn = s.crn
															AND e.ucid =  '".$this->ucid."'");
              while($row = mysqli_fetch_array($result))
              {
                $semesterid[] = $row['semesterid'];
              }
              foreach($semesterid as $value){//makes an array with crn numbers
                $result = mysqli_query($this->connection,"SELECT e.ucid as studentid,
														         c.courseid AS courseid, c.coursename AS coursename,
															     s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
																 u.name AS teachername
														  FROM sections AS s, enrolled AS e, courses AS c, users AS u
														  WHERE e.ucid = '".$this->ucid."'
														    AND s.semesterid = '".$value."'
														    AND e.crn = s.crn
														    AND s.courseid = c.courseid
															AND s.teacherid = u.ucid");
                while($row = mysqli_fetch_array($result))
              {     
					$element_array = array(
                                                                //array( 'courseid' => $row['courseid']),
                                                                //array( 'coursename' =>$row['coursename']),
                                                                //array( 'crn' => $row['crn']),
                                                                //array( 'sectionid'=> $row['sectionid']),
                                                                array( 'teacher'=> $row['teachername'])
                                                               );
                                        echo json_encode($element_array);
				}
              }
            //echo $courseNames[];
            //return json_encode($courseName);
              
       }else{
        echo("connection error");
       }
    }

    
}


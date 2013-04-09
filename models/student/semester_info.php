<?php



class studentModel{
       
  private $ucid = "";
  private $connection = "";
  public $studentData = "";
    
  public $crn = array();
  public $semesterid = array();
  public $teachername=array();
  public $courseid = array();
  public $courseNames = array();
  public $sectionid=array();
	
    
    
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
    public function getSemesterData($ucid)()
    {
        $count= 0;
       if($this->connection)
       {
              $result = mysqli_query($this->connection,"SELECT e.ucid as studentid,
							       c.courseid AS courseid, c.coursename AS coursename,
							       s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
							       u.name AS teachername
						        FROM sections AS s, enrolled AS e, courses AS c, users AS u
							WHERE e.crn = s.crn
							  AND s.courseid = c.courseid
							  AND s.teacherid = u.ucid
                                                          AND e.ucid='".$this->ucid."'");
              while($row = mysqli_fetch_array($result))
              {
                $crn[] = $row['crn'];
		$courseid[] = $row['courseid'];
		$coursename[] = $row['coursename'];
		$sectionid[] = $row['sectionid'];
		$teachername[] = $row['teachername'];
                $semesterid[] = $row['semesterid'];


              }
            //echo $courseNames[];
            echo json_encode($coursename);
			echo json_encode($courseid);
			echo json_encode($sectionid);
			echo json_encode($teachername);
			echo json_encode($crn);
			echo json_encode($semesterid);
            
            //return json_encode($courseName);
              
       }else{
        echo("connection error");
       }
    }
    

    
    
    
    
    public function getStudentData()
    {
        try{return $this->studentData;}
        catch(Exception $e){echo ($e->getMessage());}
    }
    
}
?>


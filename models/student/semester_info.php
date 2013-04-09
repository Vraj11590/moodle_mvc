<?php



class studentModel{
       
  private $ucid = "";
  private $semesterid="";
  private $connection = "";
  public $studentData = "";
    
  public $crn = array();
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
    public function getSemesterData($ucid,$semesterid)()
    {
        $count= 0;
       if($this->connection)
       {
              $result = mysqli_query($this->connection,"SELECT e.ucid as studentid,
							       c.courseid AS courseid, c.coursename AS coursename,
							       s.crn as crn, s.sectionid as sectionid,
							       u.name as teachername
						        FROM sections as s, enrolled as e, courses as c, users as u
							WHERE e.crn = s.crn
							  AND s.courseid = c.courseid
							  AND s.teacherid = u.ucid
                                                          AND e.ucid='".$this->ucid."' 
                                                          AND s.semesterid='".$this->semesterid."'");
              while($row = mysqli_fetch_array($result))
              {
                $crn[] = $row['crn'];
		$courseid[] = $row['courseid'];
		$coursename[] = $row['coursename'];
		$sectionid[] = $row['sectionid'];
		$teachername[] = $row['teachername'];
              }
            //echo $courseNames[];
            echo json_encode($coursename);
			echo json_encode($courseid);
			echo json_encode($sectionid);
			echo json_encode($teachername);
			echo json_encode($crn);
            
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


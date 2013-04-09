<?php

//class student
//handles student semester,courses

class studentControl{
    

    private $ucid = ""; //get this from session
    private $type = ""; //get this from session
    
    public $errors = array();
    public $messages = array();
    public $student = "";
    
    public function __construct(studentModel $studentModel)
    {
        $this->ucid = $_SESSION['UCID'];
        $this->type = $_SESSION['TYPE'];
        $this->student = $studentModel;
    }
    public function getStudentSemesters()
    {
        $v = $this->student->getSemesterData($this->ucid);
    }

  
}

?>
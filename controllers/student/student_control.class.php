<?php

//class student
//handles student semester,courses
include('../../models/student/student_model.class.php');

class studentControl{
    

    private $ucid = ""; //get this from session
    private $type = ""; //get this from session
    
    public $errors = array();
    public $messages = array();
    
    
    public function __construct()
    {
 
        $this->ucid = $_SESSION['UCID'];
        $this->type = $_SESSION['TYPE'];
        if($this->connection)
        {
            $studentData = new studentModel($this->ucid,$this->type);
            
        }
        
        
        
    }
    
    
    
}






?>
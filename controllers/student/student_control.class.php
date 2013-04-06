<?php

//class student
//handles student semester,courses

class studentControl{
    

    private $ucid = ""; //get this from session
    private $type = ""; //get this from session
    
    public $errors = array();
    public $messages = array();
    public $data = "";
    public function __construct(studentModel $studentModel)
    {
        $this->ucid = $_SESSION['UCID'];
        $this->type = $_SESSION['TYPE'];
        
        $data = json_encode($studentModel->getCourses());
        
        
        
        


        
    }

  
}

?>
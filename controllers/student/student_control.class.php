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
         $data =  $studentModel->test();

        $this->ucid = $_SESSION['UCID'];
        $this->type = $_SESSION['TYPE'];
    }
    public function getData()
    {
      echo ($this->data);
    }
  
}

?>
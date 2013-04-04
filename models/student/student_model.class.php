<?php

//back end student php file
//gets semesters and returns as a xml object for every semester for that student previous and current
include('../base/dbconnection.class.php');

$db = new Database();

class studentModel{
    
       private $connection = null;
       
       public function __construct($ucid,$type)
       {
            $this->connection = $db->getDatabaseConnection();
            if($this->connection)
            {
                
            }

            
       }
    
    
    
    
    
    
}




?>
<?php

   require_once('resources/database/dbconfig.php');
   include('models/base/dbconnection.class.php');
   include('controllers/login/login_control.class.php');
   include('controllers/student/student_control.class.php');
    $db = new Database();
    $login = new Login($db);
    if($login->isUserLoggedIn())
    {
        include('views/post_login/main.php');

    }
    else
    {
        include('views/pre_login/login.php');
    }
   
   
?>

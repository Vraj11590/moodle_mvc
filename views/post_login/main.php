 <?php include('views/base/header.php'); ?>

<?php
$studentModel = new studentModel();
$student = new studentControl($studentModel);
echo($student->getData());

?>
 
<link rel="stylesheet" type="text/css" href="views/post_login/css/structure.css">

 <div id = "main">
     
     <div id = "header">
          <div id="userpanel">
               <div id = "user_top">
                         <label>Hey, <?php echo $_SESSION['NAME']; ?>  !</label>
                          <a href="index.php?logout">Logout</a>
               </div>
               <div id = "user_middle">
                         <ul>
                             <li> <a href = "#"> Account Settings</a> </li>
                             <li> <a href = "#"> Edit My Profile </a> </li>
                         </ul>
                         
                         <b><label>April 4, 2013 @ 2:36 PM</label></b>

               </div>

          </div>
          <div id="semesterpanel">
               <center>
               <table>
                    <form action="" name="semester" id="semester_select">
                         <label>Select Semester:</label><br>
                         <select>
                              <option value=""> <?php echo($student->ucid); ?> </option>
                         </select>
                    </form>
               </table>
               </center>
          </div>
     </div>
     
     
     
     
     
     
 </div>
 
 <?php include('views/base/footer.php'); ?>
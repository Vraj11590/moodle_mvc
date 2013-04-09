 <?php include('views/base/header.php'); ?>
<?php
 $studentModel = new studentModel($db);
 $student = new studentControl($studentModel);
?>
 
<script>
    var test = JSON.parse('<?php $student->getStudentSemesters() ?>');
    var e = JSON.decode(test);
</script>
 <link rel="stylesheet" type="text/css" href="views/post_login/css/structure.css">
 <body>
<div id = "main">
    <center><div id="logo"><img src="http://i1321.photobucket.com/albums/u544/vj11590/logo_zps0cbcb553.jpg" width:"960px"></div></center>
    <div id = "header">
         <div id="semestercourse">
            <div id ="semesterpanel">
               <center>
               <table>
                    <form action="" name="semester" id="semester_select">
                         <label>Select Semester:fdafdafdafdasfdasfadfdafdasfadafdasfadsfasd</label><br>
                         <select>
                              <option id="test" value="3">  </option>
                         </select>
                    </form>
               </table>
               </center>
            </div>
          </div>
         
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
     </div>
  
	 <div id="spacer"></div>
    <div id = "content">
		<div id = "contentleft"> </div>
		<div id = "contentmain"> </div>
    </div>
</div>
</body>
 <?php include('views/base/footer.php'); ?>
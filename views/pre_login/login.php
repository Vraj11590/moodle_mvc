<?php include('views/base/header.php'); ?>

<style>
  .login{
		background-color:#eee9d5;
	}
    #loginwrapper{
		background-color:#eee;
        width:200px;
        box-shadow: 10px 10px 5px #888;
        margin: 0 auto;
        padding:10px;
    }
	#news{
		margin:0 auto;
		background-color:#eee;
		padding:10px;
		width:350px;
	}
	p{
		line-height:150%;
		color:gray;
		text-align:center;
	}
	ul{
		color:red;
		font-size:16px;
	}
	li{
		list-style-type: none;
	}

    center.label{
        padding: 10px;
        width:200px;
        margin:auto;
		font-size:16px;
		color:blue;
		font-weight:900;
		border-bottom:1px dotted black;
		background-color:#eee;
		}
		
</style>

<body class="login">
    
	<div id = "news"> 
		<center>
		<b> Moodle User Group (MUG) Meetings </b> <br/>
		</center>
<p>These are informal lunch meetings where faculty can ask questions, share experiences and hear about how other instructors are using Moodle.
</p>
<center>
<ul>
    <li>October 16, 11:30 - 1:00 Faculty Cafeteria</li>
    <li>November 20, 11:30 - 1:00 Faculty Cafeteria</li>
    <li>December 4, 11:30 - 1:00 Faculty Cafeteria </li>
</ul>
</center>
	</div>
	<center class="label"> <label>Login to Moodle++</label> </center>
    <div id="loginwrapper">
    <center>
        <form id="loginform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             <label> UCID:  </label><input type="text" maxlength=6 width:"50px" name="UCID" placeholder="Enter UCID.." required style = "text-align:center; padding:2px;"/>
             <br>
             <br>
             <label> Pass:  </label><input type="password" maxlength=20 name="PASSWORD" placeholder="Enter Password.." required style="text-align:center; padding:2px;"/>
             <br>
             <br>
             <input type="submit" value="Login" name="loginsubmit" style="padding:5px;"/>
        <?php
            if ($login->errors) {
                foreach ($login->errors as $error) {
                    echo '<div class="message_error">'.$error.'</div>';                
                }
            }
            
        ?> 
         
        </form>

    </center>

    </div>


<?php include('views/base/footer.php'); ?>

<div id = "timestamp">
	
	<center>
		<?php echo date("g:i:s A D, F jS Y"); ?>
	</center>
	
</div>

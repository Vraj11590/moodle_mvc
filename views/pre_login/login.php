<?php include('views/base/header.php'); ?>

<style>

    #loginwrapper{
        width:200px;
        height:150px;
        box-shadow: 10px 10px 5px #888;
        margin:auto;
        padding:10px;
        border-left:1px solid red;
        border-top:1px solid blue;
    }
    body.login{
        margin-top:100px;
    }
    center.label{
        padding: 10px;
        background-color:gray;
        width:200px;
        margin:auto;
    }
</style>

<body class="login">
    <center class="label"> Enter UCID and Password. </center>

    <div id="loginwrapper">
    <center>
        <form id="loginform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             <input type="text" maxlength=6 name="UCID" placeholder="Enter UCID.." required style = "text-align:center; padding:2px;"/>
             <br>
             <br>
             <input type="password" maxlength=20 name="PASSWORD" placeholder="Enter Password.." required style="text-align:center; padding:2px;"/>
             <br>
             <br>
             <input type="submit" value="Login" name="loginsubmit" style="padding:5px;"/>
         
        </form>             
    </center>

    </div>

      


<?php include('views/base/footer.php'); ?>
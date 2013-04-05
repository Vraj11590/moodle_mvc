<?php
/**
 * class Login
 * handles the user login/logout/session 
 */
class Login
{
    private $connection = null;
    private $ucid = "";
    private $password = "";
    public  $errors = array();
    public  $messages = array();
    private $user_is_logged_in          = false;                    // status of login

    
    public $view_ucid = "";
    public $view_type = "";
/**
* you know, when you do "$login = new Login();"
*/
    public function __construct(Database $db)
    {
        $this->connection = $db->getDatabaseConnection();
        
        if($this->connection)
        {
            session_start();
                if (isset($_GET["logout"]))
                {
                        //echo("in logout");                                                //LOG OUT DESTROY SESSION
                        $this->doLogOut();     
                }
                elseif (!empty($_SESSION['UCID']) && ($_SESSION['user_logged_in'] == 1)) //check if there is an empty session there or not.
                {
                    //echo("Loggin in with session data");
                   // $this->doLogOut();
                    $this->loginWithSessionData();                
                }
                elseif(isset($_POST["loginsubmit"]))//new login user
                {

                    if( !empty( $_POST['UCID'] ) && !empty( $_POST['PASSWORD']  ) )
                    {
                        //echo("Login with Post Data");
                        $this->loginPostData();
                    }
                    elseif(empty($_POST['UCID']))
                            {
                                $this->errors[] = "UCID not provided.";
                                
                            }
                            elseif(empty($_POST['PASSWORD']))
                            {
                                $this->errors[] = "Password not entered.";
                            }
                }
        }
        else
        {
            $this->errors[] = "Problem With SQL connection";            
        }
        
        if(isset($_COOKIE['UCID']))
        {
            $this->view_ucid = strip_tags($_COOKIE['UCID']);
        }
        else
        {
            $this->view_ucid = "UCID..";
        }
        
        
    }
    private function loginWithSessionData()
    {
        $this->user_is_logged_in = true;
    }
        
    private function loginPostData()
    {
        //echo("in postdata()");
        $this->ucid = $this->connection->real_escape_string($_POST['UCID']);
        $checklogin = $this->connection->query("SELECT id,ucid,password,name,type FROM users WHERE ucid = '".$this->ucid."';");
        if($checklogin->num_rows == 1)
        {
            $result_row = $checklogin->fetch_object();
            //echo ($result_row->password);
            //echo ($_POST['PASSWORD']);
            //echo($result_row->name);
            if($_POST['PASSWORD'] == $result_row->password)
                    {
                        $_SESSION['UCID'] = $result_row->ucid;
                        $_SESSION['TYPE'] = $result_row->type;
                        $_SESSION['NAME'] = $result_row->name;
                        $_SESSION['user_logged_in'] = 1;
                        
                        setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
                        setcookie("type", $result_row->type, time() + (3600*24*100));
                        
                        $this->user_is_logged_in = true;
                        
                        return true;
                    } else {
                        
                        $this->errors[] = "Wrong Password.";
                        return false;
                    }

        }
       else{
            $this->errors[] = "This user does not exist.";
            return false;
            }
    }
    public function doLogOut()
    {
        $_SESSION = array();
        session_destroy();
        $this->user_is_logged_in = false;
        $this->messages[] = "You have been logged out.";
        echo("Logout finished.");
    }
        
    public function isUserLoggedIn()
    {
        
        return $this->user_is_logged_in;
    }
  }  
?>
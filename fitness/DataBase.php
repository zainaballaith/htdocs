<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn( $username, $password)
    {
        
        $login = "wrong";
        
        $this->sql = "select * from users where username = '" . $username . "' AND password = '" . $password . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) != 0) {
            
            $dbtype = $row['type'];
            
            
           if ($dbtype == "admin")
           {$login = "admin";}
            
            else{
                
                 if($dbtype == "trainer") 
                   {$login = "trainer";}
                
                else
                {
                     if($dbtype == "trainee") 
                        {$login = "trainee";}
                    
                    else $login = "wrong";
                    
                }
                
                
            }
               
           
            
        }
        

        return $login;
    }

    function signUp( $username, $fullname, $email,$password, $cpassword,$age, $weight, $height)
    {
        
               
        $this->sql =
            "INSERT INTO trainees (trainee_user,fullname,email,age,weight,height ) VALUES ('" . $username . "','" . $fullname . "','" . $email . "','" . $age . "','" . $weight . "','" . $height . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
    
    function checkUser ($username)
    {
        
        $this->sql = " SELECT * FROM users WHERE username = '" . $username . "'";
        
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0)
            return false;
        else return true;
            
    }
    
    function insertUser ($username,$password)
    {
        
        $this->sql = "INSERT INTO users (username,password,type ) VALUES ('" . $username . "','" . $password . "','trainee')";
        
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
    
     function insertsession ($name,$tname,$start,$end,$from,$tooo)
    {
        
        $this->sql = "INSERT INTO sessions (sname,trainer_user,start_date,end_date,start_time,end_time ) VALUES ('" . $name . "','" . $tname . "','" . $start . "','" . $end . "','" . $from . "','" . $tooo . "')";
        
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
    
   

}

?>

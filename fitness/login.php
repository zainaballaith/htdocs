<?php

require "DataBase.php";
$db = new DataBase();

$username = $_POST['username'];    
$password = $_POST['password'];







if (isset($username) && isset($password)) {
    if ($db->dbConnect()) {
        
       $dbtype = $db->logIn($username, $password);
        
        if ($dbtype == "admin") 
        {echo "admin login Success";}
        
        else {
            
             if ($dbtype == "trainer") 
        { echo "trainer login success";}
            
            else {
                
                if ($dbtype == "trainee") 
        {echo "trainee login success";}
                
                else{
                    
                    if ($dbtype == "wrong") 
        {echo "Wrong username or password";}
                }
                
            }
            
        }
        
        
        
        
        
        
        
        
             
    } else echo "Error: Database connection";
} else echo "please enter username and password";



?>

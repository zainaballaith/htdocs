<?php


require "DataBase.php";
$db = new DataBase();

$username= $_POST['username'];
$fullname= $_POST['fullname'];
$email= $_POST['email'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$age= $_POST['age'];
$weight= $_POST['weight'];
$height= $_POST['height'];

if (isset($username) && isset($fullname) && isset($email) && isset($password)  && isset($cpassword)  && isset($age)  && isset($weight)  && isset($height) ){
    if ($db->dbConnect()) {
        
        $isValidEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
        
        if(strlen($password)< 8)
    {
        echo " minimum password lenght is 8";
    }
    else if($isValidEmail==false)
    {
        echo " not valid email";
    }
    else if($password != $cpassword)
    {
        echo "verify confirm password";
        
    }
    
    else
    {
    
        if($db->checkUser($username)){
            if ($db->signUp( $username, $fullname, $email, $password, $cpassword, $age, $weight, $height) && $db->insertUser($username,$password)) {
                    
            echo "Sign Up Success";
        } else echo "Sign up Failed";
            
        }
        else echo "username is already taken";
    }
        
    } else echo "Error: Database connection";
} else echo "All fields are required";




?>



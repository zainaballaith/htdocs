<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitnessdatabase";

$conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

       




$name= "session two";
$tname= "trainer";
$start= "2016-10-10";
$end= "2016-11-11";
$from= "10:00";
$tooo= "11:00";

       
/*$name= $_POST['name'];
$tname= $_POST['tname'];
$from= $_POST['from'];
$tooo= $_POST['tooo'];
$start= $_POST['start'];
$end= $_POST['end'];*/



       if (isset($name) && isset($tname) && isset($start) && isset($end)  && isset($from)  && isset($tooo) )
       {
           
           $sql = "SELECT * FROM sessions WHERE trainer_user = '" . $tname . "' AND start_time = '" . $from . "'";
           
           $result = $conn->query($sql);

              if ($result->num_rows > 0)
                  
              {
                  
                $sql = "SELECT * FROM sessions WHERE trainer_user = '" . $tname . "' AND end_date > '" . $start . "'";
           
           $result = $conn->query($sql);

              if ($result->num_rows > 0)
                  
              {
                  echo"the time choosen for this trainer is busy , try another time or date ";
                  
              }
                  else{ 
                      
                      
                      $sql = "INSERT INTO sessions (sname,trainer_user,start_date,end_date,start_time,end_time ) VALUES ('" . $name . "','" . $tname . "','" . $start . "','" . $end . "','" . $from . "','" . $tooo . "')";
       
               if ($conn->query($sql) === TRUE) {
                  echo "Session inserted";
                      } else {  echo "Failed insertion"; }

               $conn->close();
                      
                      }
                  
                  
              }
           
           else{ 
           
               $sql = "INSERT INTO sessions (sname,trainer_user,start_date,end_date,start_time,end_time ) VALUES ('" . $name . "','" . $tname . "','" . $start . "','" . $end . "','" . $from . "','" . $tooo . "')";
       
               if ($conn->query($sql) === TRUE) {
                  echo "Session inserted";
                      } else {  echo "Failed insertion"; }

               $conn->close();
           
           
               }
           
          
           
       }else echo "All fields are required";
       
       
       
       
   





?>

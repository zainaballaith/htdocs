<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitnessdatabase";

$conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 







$name = $_POST['param1'];
$tname= $_POST['param2'];
$start= $_POST['param3'];
$end  = $_POST['param4'];
$from = $_POST['param5'];
$tooo = $_POST['param6'];




       if (isset($name) && isset($tname) && isset($start) && isset($end)  && isset($from)  && isset($tooo) )
           
       {
           $sql = "SELECT * FROM trainers WHERE trainer_user = '" . $tname . "'";
           
           $result = mysqli_query($conn,$sql);
           
           if(mysqli_num_rows($result) > 0)
           {
               $sql = "SELECT * FROM sessions WHERE trainer_user = '" . $tname . "'  
                            
                            AND( '" . $from . "' BETWEEN start_time AND end_time OR '" . $tooo . "' BETWEEN start_time AND end_time)
                            
                            AND( '" . $start . "' BETWEEN start_date AND end_date OR '" . $end . "' BETWEEN start_date AND end_date)";
           
        
           $result = mysqli_query($conn,$sql);
           
           
           
           if (mysqli_num_rows($result) > 0)
           {
               echo" the time choosen for this trainer is busy , try another time or date ";
           }
           else
           {
               
               
               
                $sql = "SELECT * FROM privatesubscription WHERE trainer_user = '" . $tname . "'  
                            
                            AND( '" . $from . "' BETWEEN start_time AND end_time OR '" . $tooo . "' BETWEEN start_time AND end_time)
                            
                            AND( '" . $start . "' BETWEEN start_date AND end_date OR '" . $end . "' BETWEEN start_date AND end_date)";
           
        
           $result = mysqli_query($conn,$sql);
           
           
           
           if (mysqli_num_rows($result) > 0)
           {
               echo" the time choosen for this trainer is busy , try another time or date ";
           }
           else
           {
               
                $sql = "INSERT INTO sessions (sname,trainer_user,start_date,end_date,start_time,end_time ) VALUES ('" . $name . "','" . $tname . "','" . $start . "','" . $end . "','" . $from . "','" . $tooo . "')";
       
               if ($conn->query($sql) === TRUE) {
                  echo "the session inserted";
                      } else {  echo "Failed insertion"; }

               $conn->close(); 
           }
               
           }
        
           }
           else
           {
               
               echo"Not valid trainer username.";
           }
           
           
          
           
       }else echo "All fields are required";
       
       
       
       
   
?>

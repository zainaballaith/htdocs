<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitnessdatabase";

$conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


$stmt = $conn->prepare(" SELECT sname,trainer_user,start_date,end_date,start_time,end_time,pic FROM sessions ");

$stmt ->execute();
$stmt ->bind_result($sname,$trainer_user,$start_date,$end_date,$start_time,$end_time,$pic);

$row = array();

while($stmt -> fetch())
{
    
    $temp = array();
    
    $temp['sname'] =$sname;
    $temp['trainer_user'] =$trainer_user;
    $temp['start_date'] =$start_date;
    $temp['end_date'] =$end_date;
    $temp['start_time'] =$start_time;
    $temp['end_time'] =$end_time;
    $temp['pic'] =$pic;
    
    
    array_push($row,$temp);
}

echo json_encode($row);

?>
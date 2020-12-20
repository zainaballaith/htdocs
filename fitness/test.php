<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitnessdatabase";

$conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$tname= "trainer";
$end = "2015-10-10";




$sql = "SELECT * FROM sessions WHERE trainer_user = '" . $tname . "' AND end_date > '" . $end . "'";
           
           $result = $conn->query($sql);


 if ($result->num_rows > 0)
 {
     
     while($row = $result->fetch_assoc()) {
    echo "id: " . $row["s_id"]. " " . $row["sname"]. "<br>";}
     
 }
else echo "Nothing found";


?>

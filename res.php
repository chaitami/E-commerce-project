<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'cc');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$response['destination']=array();



		$query1=mysqli_query($con,"SELECT * FROM exem");




while ($row=mysqli_fetch_array($query1)){

    
    $track=array();
    $track['ville']=$row["ville"];
    $track['dated']=$row["dated"];
    $track['photo']=$row["photo"];
   
    
    array_push($response['destination'], $track);
    
   
}
$response["success"] = 1;
echo json_encode($response);


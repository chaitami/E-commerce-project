<?php

include('includes/config.php');
$response['products']=array();



		$query1=mysqli_query($con,"SELECT * FROM products");




while ($row=mysqli_fetch_array($query1)){

    
    $track=array();
    $track['Name']=$row["productName"];
    $track['Price']=$row["productPrice"];
    $track['Image']=$row["productImage1"];
   
    
    array_push($response['products'], $track);
    
   
}
$response["success"] = 1;
echo json_encode($response);


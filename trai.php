<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trai
 *
 * @author YOUNES CH
 */
include('includes/config.php');
class trai {
    //put your code here
    static function getid($email)
    {
        
     $query1=mysqli_query($con,"select id from users where email=$email");
    $cur=mysqli_fetch_array($query1);
    $id=0;
    while ($row = $cur-> fetch()) {
       $id= $row[0];
    }
     $cur->closeCursor();
     return $id;
    }
    static function update($payment,$id)
    {
        
         $query=mysqli_query($con,"update orders set paymentMethod='$payment' where userId = '$id'");
    }
}

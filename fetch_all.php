<?php


header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

include "connection.php";
$sql =  "SELECT *  FROM products";
$result =  mysqli_query($conn , $sql) or die("it failed");

if(mysqli_num_rows($result)  > 0  )
{
   
    $output =  mysqli_fetch_all($result , MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
   echo json_encode(array('message' => "no record found"  , 'status' => false));
}


?>
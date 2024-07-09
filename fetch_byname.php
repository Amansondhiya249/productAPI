<?php

// {
//  "product_name" : "name Of Product";
// }


header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

 //we dont know the request where it comimg from so to get it in proper order we use below func
 $data =  json_decode(file_get_contents("php://input") ,  true);


include "connection.php";

//we have to give same name as taken here when we fire request in this api 
$name  = $data['product_name'] ;


$sql =  "SELECT *  FROM products where `pname` = '$name'";
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
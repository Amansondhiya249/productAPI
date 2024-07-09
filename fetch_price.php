<?php


// {
//  "ordertype" : "desc";
// }

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');


$data =  json_decode(file_get_contents("php://input"),  true);

include "connection.php";


$value  = $data['ordertype'];


if($value == "desc")
$sql =  "SELECT * FROM `products` order by  `price` DESC;";
else
$sql =  "SELECT * FROM `products` order by  `price` ;";


$result =  mysqli_query($conn, $sql) or die("it failed");

if (mysqli_num_rows($result)  > 0) {

    $output =  mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => "no record found", 'status' => false));
}
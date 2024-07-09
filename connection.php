<?php

$password ="";
$servername = "localhost";
$username = "root";
$database = "productsdb";

    $conn = mysqli_connect($servername,$username , $password ,$database);

if(!$conn)
{
    echo  "connectin not establish";
}
// else{
//     echo "connection successfull \n";
// }
?>
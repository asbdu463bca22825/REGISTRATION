<?php
 
$conn=new mysqli(
'localhost',
'root',
'novalnet',
'admin'
);

if($conn->connect_error){

die("Connection Failed ".$conn->connect_error);

}

?>

<?php
 
$conn=new mysqli(
'localhost',
'root',
'novalnet',
'project'
);

if($conn->connect_error){

die("Connection Failed ".$conn->connect_error);

}

?>

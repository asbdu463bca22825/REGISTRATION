<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "student_db"
);

if(!$conn){
    die("Connection Failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_number = $_POST['phone_number'];

$sql = "INSERT INTO users(name,email,password, confirm_password, phone_number)
VALUES('$name','$email','$password','$confirm_password','$phone_number')";

if(mysqli_query($conn,$sql)){
    echo "Registration Successful";
}
else{
    echo "Error";
}

mysqli_close($conn);

?>
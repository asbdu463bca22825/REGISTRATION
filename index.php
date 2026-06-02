<?php
include "database.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register from</title>
</head>
<body>

<h2>Register Form</h2>

<form method="POST">

    <input type="text" name="name" placeholder="Enter Name"><br><br>

    <input type="email" name="email" placeholder="Enter your email"><br><br>

    <input type="password" name="password" placeholder="Enter password"><br><br>

    <input type="password" name="confirmpassword" placeholder="Enter confirm password"><br><br>

    <input type="tel" name="phonenum" placeholder="Enter Phone number"><br><br>

    <button type="submit" name="submit">Register</button>

</form>

<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenum= $_POST['phonenum'];

    // Validation
    if(
        empty($name) ||
        empty($email) ||
        empty($password) ||
        empty($phonenum) 
       
    ){
        echo "<script>alert('Please fill all fields')</script>";
    }

    else{
$sql = "INSERT INTO user(name,email,password,phonenum)
VALUES('$name','$email','$password',$phonenum)";

if($conn->query($sql)){
    echo "Registration Success";
}
else{
    die("SQL Error: " . $conn->error);
}
    }
}

?>

<a href="login.php">Login</a>

</body>
</html>

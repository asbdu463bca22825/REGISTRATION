<?php
include "db.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register Form</h2>

<form method="POST">

    <input type="text" name="name" placeholder="Enter Name"><br><br>

    <input type="number" name="age" placeholder="Enter Age"><br><br>

    <input type="number" name="mobileno" placeholder="Enter Mobile"><br><br>

    <input type="email" name="email" placeholder="Enter Email"><br><br>

    <input type="password" name="password" placeholder="Enter Password"><br><br>

    <button type="submit" name="submit">Register</button>

</form>

<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation
    if(
        empty($name) ||
        empty($age) ||
        empty($mobileno) ||
        empty($email) ||
        empty($password)
    ){
        echo "<script>alert('Please fill all fields')</script>";
    }

    else{
$sql = "INSERT INTO user(name,age,mobileno,email,password)
VALUES('$name','$age','$mobileno','$email','$password')";

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

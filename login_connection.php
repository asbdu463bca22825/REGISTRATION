<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "student_db"
);

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password))
    {
        $message = "Please fill all fields";
    }
    else
    {
        $sql = "SELECT * FROM users
                WHERE email='$email'
                AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $message = "Login Success";
        }
        else
        {
            $message = "Invalid Email or Password";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST">

    <input type="email"
           name="email"
           placeholder="Enter Email">

    <br><br>

    <input type="password"
           name="password"
           placeholder="Enter Password">

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

<h3><?php echo $message; ?></h3>

</body>
</html>
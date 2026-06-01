<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){

        echo "Please fill all fields";
        exit();

    }

    $sql = "SELECT * FROM user
    WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $_SESSION['user'] = $row['name'];

        echo "success";
    }

    else{
        echo "Invalid Login";
    }

    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body>

<h2>Login Page</h2>

<form id="loginForm">

<input type="email" id="email" placeholder="Enter Email"><br><br>

<input type="password" id="password" placeholder="Enter Password"><br><br>

<button type="submit">Login</button>

</form>

<h3 id="result"></h3>

<script>

$(document).ready(function(){

    $("#loginForm").submit(function(e){

        e.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({

            url:"login.php",
            type:"POST",

            data:{
                login:true,
                email:email,
                password:password
            },

            success:function(response){

                if(response == "success"){

                    window.location="welcome.php";

                }

                else{

                    $("#result").html(response);

                }

            }

        });

    });

});

</script>

</body>
</html>

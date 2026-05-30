
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
<style>
body{
    font-family: Arial, sans-serif;
    background:#f2f2f2;
}

.container{
    width:350px;
    background:white;
    padding:20px;
    margin:50px auto;
    border-radius:10px;
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:10px;
}

button{
    width:100%;
    padding:10px;
    background:blue;
    color:white;
    border:none;
}
</style>
</head>
<body>

<div class="container">

    <h2>Registration Form</h2>

<form onsubmit="return validateForm()">

    <label>Full Name</label>
    <input type="text" id="name" placeholder="Enter Full Name">

    <label>Email</label>
    <input type="email" id="email" placeholder="Enter Email">

    <label>Password</label>
    <input type="password" id="password" placeholder="Enter Password">

    <label>Confirm Password</label>
    <input type="password" id="confirmPassword" placeholder="Confirm Password">

    <label>Mobile Number</label>
    <input type="text" id="mobile" placeholder="Enter Mobile Number">

    <button type="submit">Register</button>

</form>
   

</div>
<script>
function validateForm()
{
    let name = document.getElementById("name").value;

    let email = document.getElementById("email").value;

    let mobile = document.getElementById("mobile").value;

    let password = document.getElementById("password").value;

    let confirmPassword =
    document.getElementById("confirmPassword").value;

    if(name == "")
    {
        alert("Name is required");
        return false;
    }

    let emailPattern =
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email))
    {
        alert("Invalid Email");
        return false;
    }

    let mobilePattern =
    /^[0-9]{10}$/;

    if(!mobilePattern.test(mobile))
    {
        alert("Mobile number must be 10 digits");
        return false;
    }

    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        return false;
    }

    if(password != confirmPassword)
    {
        alert("Passwords do not match");
        return false;
    }

    alert("Registration Successful");

    return true;
}
</script>

</body>
</html>
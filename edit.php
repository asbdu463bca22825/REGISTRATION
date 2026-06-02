<?php

session_start();

include "database.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$result = $conn->query("SELECT * FROM user WHERE id=$id");

$row = $result->fetch_assoc();

if(!$row){
    echo "User Not Found";
    exit();
}

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenum = $_POST['phonenum'];

    if(
        empty($name) ||
        empty($email) ||
        empty($password) ||
        empty($phonenum)
    ){
        echo "Please fill all fields";
    }

    else{

        $sql = "UPDATE user SET
        name='$name',
        email='$email',
        password='$password',
        phonenum='$phonenum'
        WHERE id=$id";

        if($conn->query($sql)){

            header("Location:view.php");
            exit();

        }

        else{

            echo "Error : ".$conn->error;

        }

    }

}

?>

<form method="POST">

<input type="text" name="name"
value="<?php echo $row['name']; ?>"><br><br>

<input type="email" name="email"
value="<?php echo $row['email']; ?>"><br><br>

<input type="password" name="password"
value="<?php echo $row['password']; ?>"><br><br>

<input type="tel" name="phonenum"
value="<?php echo $row['phonenum']; ?>"><br><br>

<button type="submit" name="update">Update</button>

</form>

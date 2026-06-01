<?php

session_start();

include "db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$result = $conn->query("SELECT * FROM user WHERE id=$id");

$row = $result->fetch_assoc();

if(!$row){
    echo "User Not Found";
    exit();
}

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];

    if(
        empty($name) ||
        empty($age) ||
        empty($mobileno) ||
        empty($email)
    ){
        echo "Please fill all fields";
    }

    else{

        $sql = "UPDATE user SET
        name='$name',
        age='$age',
        mobileno='$mobileno',
        email='$email'
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

<input type="number" name="age"
value="<?php echo $row['age']; ?>"><br><br>

<input type="number" name="mobileno"
value="<?php echo $row['mobileno']; ?>"><br><br>

<input type="email" name="email"
value="<?php echo $row['email']; ?>"><br><br>

<button type="submit" name="update">Update</button>

</form>

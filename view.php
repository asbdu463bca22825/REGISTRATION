<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:login.php");
    exit();
}

include "database.php";
?>

<?php

class Auth
{
    public function checkLogin()
    {
        try
        {
            session_start();

            if (!isset($_SESSION['user']))
            {
                throw new Exception("User not logged in");
            }

            return true;
        }
        catch (Exception $e)
        {
            header("Location: login.php");
            exit();
        }
    }
}
?>
protect. php
<?php

require_once "database.php";
require_once "Auth.php";

try
{
    $auth = new Auth();
    $auth->checkLogin();

    $database = new Database();
    $conn = $database->connect();

    echo "Welcome " . $_SESSION['user'];
}
catch (Exception $e)
{
    echo "Error: " . $e->getMessage();
}
?>


<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>email</th>
<th>password</th>
<th>Action</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM user");

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['password']; ?></td>

<td><?php echo $row['phonenum']; ?></td>

<td>

<a href="update.php?id=<?php echo $row['id']; ?>">update</a>

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="logout.php">Logout</a>

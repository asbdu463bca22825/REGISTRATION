<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:login.php");
    exit();
}

include "db.php";
?>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Mobile</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM user");

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['age']; ?></td>

<td><?php echo $row['mobileno']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="logout.php">Logout</a>



##covert the connection in oops

<?php

class Database
{
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "student_db"
        );
    }
}

$db = new Database();

?>



###convert the registration in oops


<?php

class UserRegistration
{
    private $conn;

    // Constructor
    public function __construct()
    {
        $this->conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "student_db"
        );

        if (!$this->conn) {
            die("Connection Failed");
        }
    }

    // Register User Method
    public function registerUser($name, $email, $password, $confirm_password, $phone_number)
    {
        $sql = "INSERT INTO users(name, email, password, confirm_password, phone_number)
                VALUES('$name', '$email', '$password', '$confirm_password', '$phone_number')";

        if (mysqli_query($this->conn, $sql)) {
            echo "Registration Successful";
        } else {
            echo "Error";
        }
    }

    // Close Connection
    public function closeConnection()
    {
        mysqli_close($this->conn);
    }
}

// Create Object
$user = new UserRegistration();

// Get Form Data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_number = $_POST['phone_number'];

// Call Method
$user->registerUser(
    $name,
    $email,
    $password,
    $confirm_password,
    $phone_number
);

// Close Connection
$user->closeConnection();

?>



##convert login in oops
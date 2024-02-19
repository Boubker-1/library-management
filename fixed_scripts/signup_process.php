<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management_system";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set and not empty
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username already exists
        $check_username = $_POST["username"];
        $check_query = "SELECT username FROM credentials WHERE username = ?";
        $stmt_check = $conn->prepare($check_query);
        $stmt_check->bind_param("s", $check_username);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            header("Location: ../fixed_scripts/signup_fail.php");
        } else {
            // Prepare SQL statement to insert user credentials into credentials table
            $stmt = $conn->prepare("INSERT INTO credentials (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);

            // Set parameters and execute
            $username = $_POST["username"];
            $password = $_POST["password"];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

            if ($stmt->execute()) {
                header("Location: ../fixed_scripts/signup_success.php");
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close statements and connection
        $stmt_check->close();
        $stmt->close();
        $conn->close();
    } else {
        echo "Username and password are required.";
    }
}
?>

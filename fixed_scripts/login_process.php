<?php
// Check if form is submitted
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set and not empty
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        // Database connection settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library_management_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to retrieve user from database
        $stmt = $conn->prepare("SELECT * FROM credentials WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Set parameters and execute
        $username = $_POST["username"];
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists in the database
        if ($result->num_rows == 1) {
            // Fetch user details
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($_POST["password"], $user["password"])) {
                // Password is correct, redirect to dashboard or desired page
                $_SESSION['username'] = $_POST["username"];
                header("Location: ../dashboard/dashboard.php");
                exit;
            } else {
                // Password is incorrect, redirect back to login page with error message
                header("Location: ../fixed_scripts/login_fail.php#login");
                exit;
            }
        } else {
            // User does not exist, redirect back to login page with error message
            header("Location: ../fixed_scripts/login_fail.php#login");
            exit;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Redirect back to login page with error message if username or password is empty
        header("Location: ../fixed_scripts/login_fail.php#login");
        exit;
    }
} else {
    // Redirect back to login page if form is not submitted
    header("Location: index.php");
    exit;
}
?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $name = $_POST["name"];
    $nationality = $_POST["nationality"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new author
    $sql = "INSERT INTO authors (name, nationality) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $name, $nationality);
    if ($stmt->execute()) {
        // author added successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $name = $_POST["name"];
    $position = $_POST["position"];
    $contact_info = $_POST["contact_info"];
    $branch_id = $_POST["branch_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new employee
    $sql = "INSERT INTO employees (name, position, contact_info, branch_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $name, $position, $contact_info, $branch_id);
    if ($stmt->execute()) {
        // Employee added successfully, redirect back to the referring page
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

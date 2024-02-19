<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $position = $_POST["position"];
    $contact_info = $_POST["contact_info"];
    $branch_id = $_POST["branch_id"];
    $employee_id = $_POST["employee_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the employee information
    $sql = "UPDATE employees SET name = ?, position = ?, contact_info = ?, branch_id = ? WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssii", $name, $position, $contact_info, $branch_id, $employee_id);
    if ($stmt->execute()) {
        // Employee updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating employee: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

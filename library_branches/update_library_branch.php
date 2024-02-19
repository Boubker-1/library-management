<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $contact_info = $_POST["contact_info"];
    $branch_id = $_POST["branch_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the library branch information
    $sql = "UPDATE library_branches SET name = ?, address = ?, contact_info = ? WHERE branch_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $name, $address, $contact_info, $branch_id);
    if ($stmt->execute()) {
        // Library branch updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating library branch: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

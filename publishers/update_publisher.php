<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $contact_info = $_POST["contact_info"];
    $publisher_id = $_POST["publisher_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the publisher information
    $sql = "UPDATE publishers SET name = ?, contact_info = ? WHERE publisher_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ssi", $name, $contact_info, $publisher_id);
    if ($stmt->execute()) {
        // Publisher updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating publisher: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

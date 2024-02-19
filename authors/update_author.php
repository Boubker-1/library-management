<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $nationality = $_POST["nationality"];
    $author_id = $_POST["author_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the author information
    $sql = "UPDATE authors SET name = ?, nationality = ? WHERE author_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ssi", $name, $nationality, $author_id);
    if ($stmt->execute()) {
        // Author updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating author: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

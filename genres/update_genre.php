<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $genre_id = $_POST["genre_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the genre information
    $sql = "UPDATE genres SET name = ? WHERE genre_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("si", $name, $genre_id);
    if ($stmt->execute()) {
        // Genre updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating genre: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

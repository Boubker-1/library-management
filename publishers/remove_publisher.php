<?php
// Check if the publisher ID is provided in the query string
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get the publisher ID from the query string
    $publisher_id = $_GET['id'];
    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to delete the publisher
    $sql = "DELETE FROM publishers WHERE publisher_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $publisher_id);
    if ($stmt->execute()) {
        // Publisher removed successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting publisher: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the referring page or display an error message
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit(); // Ensure that no further code is executed
}
?>


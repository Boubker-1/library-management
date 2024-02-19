<?php
// Check if the borrowing ID is provided in the query string
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get the borrowing ID from the query string
    $borrowing_id = $_GET['id'];
    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to delete the borrowing
    $sql = "DELETE FROM borrowings WHERE borrowing_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $borrowing_id);
    if ($stmt->execute()) {
        // Borrowing removed successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting borrowing: " . $conn->error;
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


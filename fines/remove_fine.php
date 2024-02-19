<?php
// Check if the fine ID is provided in the query string
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get the fine ID from the query string
    $fine_id = $_GET['id'];
    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to delete the fine
    $sql = "DELETE FROM fines WHERE fine_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $fine_id);
    if ($stmt->execute()) {
        // Fine removed successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting fine: " . $conn->error;
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


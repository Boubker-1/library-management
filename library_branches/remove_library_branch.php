<?php
// Check if the library branche ID is provided in the query string
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get the library branche ID from the query string
    $branch_id = $_GET['id'];
    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to delete the library branch
    $sql = "DELETE FROM library_branches WHERE branch_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $branch_id);
    if ($stmt->execute()) {
        // Library branche removed successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting library branch: " . $conn->error;
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


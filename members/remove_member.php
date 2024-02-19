<?php
// Check if the member ID is provided in the query string
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get the member ID from the query string
    $member_id = $_GET['id'];
    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to delete the member
    $sql = "DELETE FROM members WHERE member_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $member_id);
    if ($stmt->execute()) {
        // Member removed successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error deleting member: " . $conn->error;
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


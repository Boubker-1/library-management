<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $borrowing_id = $_POST["borrowing_id"];
    $member_id = $_POST["member_id"];
    $book_id = $_POST["book_id"];
    $borrowing_date = $_POST["borrowing_date"];
    $return_date = $_POST["return_date"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the borrowing information
    $sql = "UPDATE borrowings SET borrowing_id = ?, member_id = ?, book_id = ?, borrowing_date = ?, return_date = ? WHERE borrowing_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("iiissi", $borrowing_id, $member_id, $book_id, $borrowing_date, $return_date, $borrowing_id);
    if ($stmt->execute()) {
        // Borrowing updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating borrowing: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

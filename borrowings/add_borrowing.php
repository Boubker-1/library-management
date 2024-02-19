<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $member_id = $_POST["member_id"];
    $book_id = $_POST["book_id"];
    $borrowing_date = $_POST["borrowing_date"];
    $return_date = $_POST["return_date"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new borrowing
    $sql = "INSERT INTO borrowings (member_id, book_id, borrowing_date, return_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("iiss", $member_id, $book_id, $borrowing_date, $return_date);
    if ($stmt->execute()) {
        // Borrowing added successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

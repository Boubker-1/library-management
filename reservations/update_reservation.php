<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $member_id = $_POST["member_id"];
    $book_id = $_POST["book_id"];
    $reservation_date = $_POST["reservation_date"];
    $status = $_POST["status"];
    $reservation_id = $_POST["reservation_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the reservation information
    $sql = "UPDATE reservations SET member_id = ?, book_id = ?, reservation_date = ?, status = ? WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("iissi", $member_id, $book_id, $reservation_date, $status, $reservation_id);
    if ($stmt->execute()) {
        // Reservation updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating reservation: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

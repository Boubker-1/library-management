<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $member_id = $_POST["member_id"];
    $amount = $_POST["amount"];
    $reason = $_POST["reason"];
    $payment_status = $_POST["payment_status"];
    $fine_id = $_POST["fine_id"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the fine information
    $sql = "UPDATE fines SET member_id = ?, amount = ?, reason = ?, payment_status = ? WHERE fine_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("idssi", $member_id, $amount, $reason, $payment_status, $fine_id);
    if ($stmt->execute()) {
        // Fine updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating fine: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

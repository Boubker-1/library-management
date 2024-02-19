<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $member_id = $_POST["member_id"];
    $amount = $_POST["amount"];
    $reason = $_POST["reason"];
    $payment_status = $_POST["payment_status"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new fine
    $sql = "INSERT INTO fines (member_id, amount, reason, payment_status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("idss", $member_id, $amount, $reason, $payment_status);
    if ($stmt->execute()) {
        // Fine added successfully, redirect back to the referring page
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

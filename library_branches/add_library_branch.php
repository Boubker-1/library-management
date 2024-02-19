<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $name = $_POST["name"];
    $address = $_POST["address"];
    $contact_info = $_POST["contact_info"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new library_branche
    $sql = "INSERT INTO library_branches (name, address, contact_info) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("sss", $name, $address, $contact_info);
    if ($stmt->execute()) {
        // Library Branch added successfully, redirect back to the referring page
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

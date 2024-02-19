<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data (you can add more validation if needed)
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author_id = $_POST["author_id"];
    $genre_id = $_POST["genre_id"];
    $publication_date = $_POST["publication_date"];
    $availability_status = $_POST["availability_status"];

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to insert a new book
    $sql = "INSERT INTO books (isbn, title, author_id, genre_id, publication_date, availability_status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ssiiss", $isbn, $title, $author_id, $genre_id, $publication_date, $availability_status);
    if ($stmt->execute()) {
        // Book added successfully, redirect back to the referring page
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

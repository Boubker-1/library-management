<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author_id = $_POST["author_id"];
    $genre_id = $_POST["genre_id"];
    $publication_date = $_POST["publication_date"];
    $availability_status = $_POST["availability_status"];
    $book_id = $_POST["book_id"]; // Assuming you have a hidden input field for the book ID

    include "../fixed_scripts/connect_db.php";

    // Prepare the SQL statement to update the book information
    $sql = "UPDATE books SET isbn = ?, title = ?, author_id = ?, genre_id = ?, publication_date = ?, availability_status = ? WHERE book_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("ssiissi", $isbn, $title, $author_id, $genre_id, $publication_date, $availability_status, $book_id);
    if ($stmt->execute()) {
        // Book updated successfully, redirect back to the referring page
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit(); // Ensure that no further code is executed
    } else {
        echo "Error updating book: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

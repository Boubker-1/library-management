<?php
// Fetch books from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["book_id"]."</td>";
        echo "<td>".$row["isbn"]."</td>";
        echo "<td><a href='book_details.php?book_id=".$row["book_id"]."'>".$row["title"]."</a></td>";
        echo "<td>".$row["author_id"]."</td>";
        echo "<td>".$row["genre_id"]."</td>";
        echo "<td>".$row["publication_date"]."</td>";
        echo "<td>".$row["availability_status"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateBookModal".$row["book_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeBookModal".$row["book_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Book Modal for each row
        echo "<div class='modal fade' id='updateBookModal".$row["book_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateBookModalLabel".$row["book_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateBookModalLabel".$row["book_id"]."'>Update Book</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Book Form
        echo "<form action='update_book.php' method='POST'>";
		// Hidden input field for book ID
		echo "<input type='hidden' name='book_id' value='".$row["book_id"]."'>";
		// List of attributes to update
		echo "<div class='form-group'>";
		echo "<label for='book_id'>Book ID</label>";
		echo "<input type='text' class='form-control' id='book_id' name='book_id' value='".$row["book_id"]."' disabled>";
		echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='isbn'>ISBN</label>";
        echo "<input type='text' class='form-control' id='isbn' name='isbn' value='".$row["isbn"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='title'>Title</label>";
        echo "<input type='text' class='form-control' id='title' name='title' value='".$row["title"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='author'>Author</label>";
        echo "<input type='text' class='form-control' id='author' name='author_id' value='".$row["author_id"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='genre'>Genre</label>";
        echo "<input type='text' class='form-control' id='genre' name='genre_id' value='".$row["genre_id"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='publication_date'>Publication Date</label>";
        echo "<input type='date' class='form-control' id='publication_date' name='publication_date' value='".$row["publication_date"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='availability_status'>Availability</label>";
        echo "<input type='text' class='form-control' id='availability_status' name='availability_status' value='".$row["availability_status"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Book Modal for each row
        echo "<div class='modal fade' id='removeBookModal".$row["book_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeBookModalLabel".$row["book_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeBookModalLabel".$row["book_id"]."'>Remove Book</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this book?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_book.php?id=".$row["book_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No books found.</td></tr>";
}
?>
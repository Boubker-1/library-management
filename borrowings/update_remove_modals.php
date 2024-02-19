<?php
// Fetch borrowings from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["borrowing_id"]."</td>";
        echo "<td>".$row["member_id"]."</td>";
        echo "<td>".$row["book_id"]."</td>";
        echo "<td>".$row["borrowing_date"]."</td>";
        echo "<td>".$row["return_date"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateBorrowingModal".$row["borrowing_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeBorrowingModal".$row["borrowing_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Borrowing Modal for each row
        echo "<div class='modal fade' id='updateBorrowingModal".$row["borrowing_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateBorrowingModalLabel".$row["borrowing_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateBorrowingModalLabel".$row["borrowing_id"]."'>Update Borrowing</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Borrowing Form
        echo "<form action='update_borrowing.php' method='POST'>";
		// Hidden input field for borrowing ID
		echo "<input type='hidden' name='borrowing_id' value='".$row["borrowing_id"]."'>";
		// List of attributes to update
		echo "<div class='form-group'>";
		echo "<label for='borrowing_id'>Borrowing ID</label>";
		echo "<input type='text' class='form-control' id='borrowing_id' name='borrowing_id' value='".$row["borrowing_id"]."' disabled>";
		echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='member'>Member ID</label>";
        echo "<input type='text' class='form-control' id='member' name='member_id' value='".$row["member_id"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='book'>Book ID</label>";
        echo "<input type='text' class='form-control' id='book' name='book_id' value='".$row["book_id"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='borrowing_date'>Borrowing Date</label>";
        echo "<input type='text' class='form-control' id='borrowing_date' name='borrowing_date' value='".$row["borrowing_date"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='return_date'>Return Date</label>";
        echo "<input type='text' class='form-control' id='return_date' name='return_date' value='".$row["return_date"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Borrowing Modal for each row
        echo "<div class='modal fade' id='removeBorrowingModal".$row["borrowing_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeBorrowingModalLabel".$row["borrowing_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeBorrowingModalLabel".$row["borrowing_id"]."'>Remove Borrowing</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this borrowing?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_borrowing.php?id=".$row["borrowing_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No borrowings found.</td></tr>";
}
?>
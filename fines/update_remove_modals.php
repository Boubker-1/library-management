<?php
// Fetch fines from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["fine_id"]."</td>";
        echo "<td>".$row["member_id"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["reason"]."</td>";
        echo "<td>".$row["payment_status"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateFineModal".$row["fine_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeFineModal".$row["fine_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Fine Modal for each row
        echo "<div class='modal fade' id='updateFineModal".$row["fine_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateFineModalLabel".$row["fine_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateFineModalLabel".$row["fine_id"]."'>Update Fine</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Fine Form
        echo "<form action='update_fine.php' method='POST'>";
		// Hidden input field for fine ID
		echo "<input type='hidden' name='fine_id' value='".$row["fine_id"]."'>";
		// List of attributes to update
		echo "<div class='form-group'>";
		echo "<label for='fine_id'>Fine ID</label>";
		echo "<input type='text' class='form-control' id='fine_id' name='fine_id' value='".$row["fine_id"]."' disabled>";
		echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='member'>Member ID</label>";
        echo "<input type='text' class='form-control' id='member' name='member_id' value='".$row["member_id"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='amount'>amount</label>";
        echo "<input type='text' class='form-control' id='amount' name='amount' value='".$row["amount"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='reason'>Reason</label>";
        echo "<input type='text' class='form-control' id='reason' name='reason' value='".$row["reason"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='payment_status'>Payment Status</label>";
        echo "<input type='text' class='form-control' id='payment_status' name='payment_status' value='".$row["payment_status"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Fine Modal for each row
        echo "<div class='modal fade' id='removeFineModal".$row["fine_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeFineModalLabel".$row["fine_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeFineModalLabel".$row["fine_id"]."'>Remove Fine</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this fine?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_fine.php?id=".$row["fine_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No fines found.</td></tr>";
}
?>
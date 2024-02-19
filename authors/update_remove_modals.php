<?php
// Fetch authors from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["author_id"]."</td>";
        echo "<td><a href='author_details.php?author_id=".$row["author_id"]."'>".$row["name"]."</a></td>";
        echo "<td>".$row["nationality"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateAuthorModal".$row["author_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeAuthorModal".$row["author_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Author Modal for each row
        echo "<div class='modal fade' id='updateAuthorModal".$row["author_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateAuthorModalLabel".$row["author_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateAuthorModalLabel".$row["author_id"]."'>Update Author</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Author Form
        echo "<form action='update_author.php' method='POST'>";
		// Hidden input field for author ID
		echo "<input type='hidden' name='author_id' value='".$row["author_id"]."'>";
		// List of attributes to update
		echo "<div class='form-group'>";
		echo "<label for='author_id'>Author ID</label>";
		echo "<input type='text' class='form-control' id='author_id' name='author_id' value='".$row["author_id"]."' disabled>";
		echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' class='form-control' id='name' name='name' value='".$row["name"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='nationality'>Nationality</label>";
        echo "<input type='text' class='form-control' id='nationality' name='nationality' value='".$row["nationality"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Author Modal for each row
        echo "<div class='modal fade' id='removeAuthorModal".$row["author_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeAuthorModalLabel".$row["author_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeAuthorModalLabel".$row["author_id"]."'>Remove Author</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this author?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_author.php?id=".$row["author_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No authors found.</td></tr>";
}
?>
<?php
// Fetch publishers from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["publisher_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["contact_info"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updatePublisherModal".$row["publisher_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removePublisherModal".$row["publisher_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Publisher Modal for each row
        echo "<div class='modal fade' id='updatePublisherModal".$row["publisher_id"]."' tabindex='-1' role='dialog' aria-labelledby='updatePublisherModalLabel".$row["publisher_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updatePublisherModalLabel".$row["publisher_id"]."'>Update Publisher</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Publisher Form
        echo "<form action='update_publisher.php' method='POST'>";
        // Hidden input field for publisher ID
        echo "<input type='hidden' name='publisher_id' value='".$row["publisher_id"]."'>";
        // List of attributes to update
        echo "<div class='form-group'>";
        echo "<label for='publisher_id'>Publisher ID</label>";
        echo "<input type='text' class='form-control' id='publisher_id' name='publisher_id' value='".$row["publisher_id"]."' disabled>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' class='form-control' id='name' name='name' value='".$row["name"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='contact_info'>Contact Info</label>";
        echo "<input type='text' class='form-control' id='contact_info' name='contact_info' value='".$row["contact_info"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Publisher Modal for each row
        echo "<div class='modal fade' id='removePublisherModal".$row["publisher_id"]."' tabindex='-1' role='dialog' aria-labelledby='removePublisherModalLabel".$row["publisher_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removePublisherModalLabel".$row["publisher_id"]."'>Remove Publisher</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this publisher?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_publisher.php?id=".$row["publisher_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No publishers found.</td></tr>";
}
?>
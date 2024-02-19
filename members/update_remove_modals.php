<?php
// Fetch members from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["member_id"]."</td>";
        echo "<td><a href='member_details.php?member_id=".$row["member_id"]."'>".$row["name"]."</a></td>";
        echo "<td>".$row["contact_info"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateMemberModal".$row["member_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeMemberModal".$row["member_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Member Modal for each row
        echo "<div class='modal fade' id='updateMemberModal".$row["member_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateMemberModalLabel".$row["member_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateMemberModalLabel".$row["member_id"]."'>Update Member</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Member Form
        echo "<form action='update_member.php' method='POST'>";
        // Hidden input field for member ID
        echo "<input type='hidden' name='member_id' value='".$row["member_id"]."'>";
        // List of attributes to update
        echo "<div class='form-group'>";
        echo "<label for='member_id'>Member ID</label>";
        echo "<input type='text' class='form-control' id='member_id' name='member_id' value='".$row["member_id"]."' disabled>";
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

        // Remove Member Modal for each row
        echo "<div class='modal fade' id='removeMemberModal".$row["member_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeMemberModalLabel".$row["member_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeMemberModalLabel".$row["member_id"]."'>Remove Member</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this member?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_member.php?id=".$row["member_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No members found.</td></tr>";
}
?>
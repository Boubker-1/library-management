<?php
// Fetch librarybranchs from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["branch_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["contact_info"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateLibraryBranchModal".$row["branch_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeLibraryBranchModal".$row["branch_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update LibraryBranch Modal for each row
        echo "<div class='modal fade' id='updateLibraryBranchModal".$row["branch_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateLibraryBranchModalLabel".$row["branch_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateLibraryBranchModalLabel".$row["branch_id"]."'>Update LibraryBranch</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update LibraryBranch Form
        echo "<form action='update_library_branch.php' method='POST'>";
        // Hidden input field for librarybranch ID
        echo "<input type='hidden' name='branch_id' value='".$row["branch_id"]."'>";
        // List of attributes to update
        echo "<div class='form-group'>";
        echo "<label for='branch_id'>Library Branch ID</label>";
        echo "<input type='text' class='form-control' id='branch_id' name='branch_id' value='".$row["branch_id"]."' disabled>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' class='form-control' id='name' name='name' value='".$row["name"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='address'>Address</label>";
        echo "<input type='text' class='form-control' id='address' name='address' value='".$row["address"]."'>";
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

        // Remove LibraryBranch Modal for each row
        echo "<div class='modal fade' id='removeLibraryBranchModal".$row["branch_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeLibraryBranchModalLabel".$row["branch_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeLibraryBranchModalLabel".$row["branch_id"]."'>Remove LibraryBranch</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this librarybranch?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_library_branch.php?id=".$row["branch_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No librarybranchs found.</td></tr>";
}
?>
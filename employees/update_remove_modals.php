<?php
// Fetch employees from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["employee_id"]."</td>";
        echo "<td><a href='employee_details.php?employee_id=".$row["employee_id"]."'>".$row["name"]."</a></td>";
        echo "<td>".$row["position"]."</td>";
        echo "<td>".$row["contact_info"]."</td>";
        echo "<td>".$row["branch_id"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateEmployeeModal".$row["employee_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeEmployeeModal".$row["employee_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Employee Modal for each row
        echo "<div class='modal fade' id='updateEmployeeModal".$row["employee_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateEmployeeModalLabel".$row["employee_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateEmployeeModalLabel".$row["employee_id"]."'>Update Employee</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Employee Form
        echo "<form action='update_employee.php' method='POST'>";
		// Hidden input field for employee ID
		echo "<input type='hidden' name='employee_id' value='".$row["employee_id"]."'>";
		// List of attributes to update
		echo "<div class='form-group'>";
		echo "<label for='employee_id'>Employee ID</label>";
		echo "<input type='text' class='form-control' id='employee_id' name='employee_id' value='".$row["employee_id"]."' disabled>";
		echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' class='form-control' id='name' name='name' value='".$row["name"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='position'>Position</label>";
        echo "<input type='text' class='form-control' id='position' name='position' value='".$row["position"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='contact_info'>Contact Info</label>";
        echo "<input type='text' class='form-control' id='contact_info' name='contact_info' value='".$row["contact_info"]."'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='branch'>Branch ID</label>";
        echo "<input type='text' class='form-control' id='branch' name='branch_id' value='".$row["branch_id"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Employee Modal for each row
        echo "<div class='modal fade' id='removeEmployeeModal".$row["employee_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeEmployeeModalLabel".$row["employee_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeEmployeeModalLabel".$row["employee_id"]."'>Remove Employee</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this employee?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_employee.php?id=".$row["employee_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No employees found.</td></tr>";
}
?>
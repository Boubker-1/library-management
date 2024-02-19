<?php
// Fetch reservations from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["reservation_id"]."</td>";
        echo "<td>".$row["member_id"]."</td>";
        echo "<td>".$row["book_id"]."</td>";
        echo "<td>".$row["reservation_date"]."</td>";
        echo "<td>".$row["status"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateReservationModal".$row["reservation_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeReservationModal".$row["reservation_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Reservation Modal for each row
        echo "<div class='modal fade' id='updateReservationModal".$row["reservation_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateReservationModalLabel".$row["reservation_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateReservationModalLabel".$row["reservation_id"]."'>Update Reservation</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Reservation Form
        echo "<form action='update_reservation.php' method='POST'>";
        // Hidden input field for reservation ID
        echo "<input type='hidden' name='reservation_id' value='".$row["reservation_id"]."'>";
        // List of attributes to update
        echo "<div class='form-group'>";
        echo "<label for='reservation_id'>Reservation ID</label>";
        echo "<input type='text' class='form-control' id='reservation_id' name='reservation_id' value='".$row["reservation_id"]."' disabled>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='member'>Member ID</label>";
        echo "<input type='text' class='form-control' id='member' name='".$row["member_id"]."' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='book'>Book ID</label>";
        echo "<input type='text' class='form-control' id='book' name='".$row["book_id"]."' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='reservation_date'>Reservation Date</label>";
        echo "<input type='date' class='form-control' id='reservation_date' name='".$row["reservation_date"]."' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='status'>Status</label>";
        echo "<input type='text' class='form-control' id='status' name='".$row["status"]."' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Reservation Modal for each row
        echo "<div class='modal fade' id='removeReservationModal".$row["reservation_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeReservationModalLabel".$row["reservation_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeReservationModalLabel".$row["reservation_id"]."'>Remove Reservation</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this reservation?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_reservation.php?id=".$row["reservation_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No reservations found.</td></tr>";
}
?>
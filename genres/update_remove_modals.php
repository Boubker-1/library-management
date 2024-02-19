<?php
// Fetch genres from the database
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["genre_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        // Update button
        echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateGenreModal".$row["genre_id"]."'>Update</button></td>";
        // Remove button
        echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#removeGenreModal".$row["genre_id"]."'>Remove</button></td>";
        echo "</tr>";

        // Update Genre Modal for each row
        echo "<div class='modal fade' id='updateGenreModal".$row["genre_id"]."' tabindex='-1' role='dialog' aria-labelledby='updateGenreModalLabel".$row["genre_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='updateGenreModalLabel".$row["genre_id"]."'>Update Genre</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        // Update Genre Form
        echo "<form action='update_genre.php' method='POST'>";
        // Hidden input field for genre ID
        echo "<input type='hidden' name='genre_id' value='".$row["genre_id"]."'>";
        // List of attributes to update
        echo "<div class='form-group'>";
        echo "<label for='genre_id'>Genre ID</label>";
        echo "<input type='text' class='form-control' id='genre_id' name='genre_id' value='".$row["genre_id"]."' disabled>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name</label>";
        echo "<input type='text' class='form-control' id='name' name='name' value='".$row["name"]."'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Remove Genre Modal for each row
        echo "<div class='modal fade' id='removeGenreModal".$row["genre_id"]."' tabindex='-1' role='dialog' aria-labelledby='removeGenreModalLabel".$row["genre_id"]."' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='removeGenreModalLabel".$row["genre_id"]."'>Remove Genre</h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>Are you sure you want to remove this genre?</p>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
        echo "<a href='remove_genre.php?id=".$row["genre_id"]."' class='btn btn-danger'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<tr><td colspan='9'>No genres found.</td></tr>";
}
?>
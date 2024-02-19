<?php
echo "<div class='modal fade' id='addGenreModal' tabindex='-1' role='dialog' aria-labelledby='addGenreModalLabel' aria-hidden='true'>";
echo "<div class='modal-dialog' role='document'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "<h5 class='modal-title' id='addGenreModalLabel'>Add New Genre</h5>";
echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
echo "<span aria-hidden='true'>&times;</span>";
echo "</button>";
echo "</div>";
echo "<div class='modal-body'>";
echo "<form action='add_genre.php' method='POST'>";
echo "<div class='form-group'>";
echo "<label for='name'>Name</label>";
echo "<input type='text' class='form-control' id='name' name='name' required>";
echo "</div>";
echo "<button type='submit' class='btn btn-primary'>Add Genre</button>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
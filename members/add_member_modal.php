<?php
echo "<div class='modal fade' id='addMemberModal' tabindex='-1' role='dialog' aria-labelledby='addMemberModalLabel' aria-hidden='true'>";
echo "<div class='modal-dialog' role='document'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "<h5 class='modal-title' id='addMemberModalLabel'>Add New Member</h5>";
echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
echo "<span aria-hidden='true'>&times;</span>";
echo "</button>";
echo "</div>";
echo "<div class='modal-body'>";
echo "<form action='add_member.php' method='POST'>";
echo "<div class='form-group'>";
echo "<label for='name'>Name</label>";
echo "<input type='text' class='form-control' id='name' name='name' required>";
echo "</div>";
echo "<div class='form-group'>";
echo "<label for='contact_info'>Contact Info</label>";
echo "<input type='text' class='form-control' id='contact_info' name='contact_info' required>";
echo "</div>";
echo "<button type='submit' class='btn btn-primary'>Add Member</button>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
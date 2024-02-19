<?php
// Fetch table names from the database
include "check_username.php";
include "connect_db.php";
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tableName = $row['Tables_in_library_management_system'];
        if ($tableName != "credentials"){
			// Convert table name to readable format
	    	$formattedTableName = ucwords(str_replace('_', ' ', $tableName));
	    	$link = "../" . $tableName . "/" . $tableName . "_table.php";
	        echo "<li class='nav-item'>";
	        echo "<a class='nav-link' href=" . $link . ">$formattedTableName</a>";
	        echo "</li>";
    	}
    }
} else {
    echo "0 results";
}
?>
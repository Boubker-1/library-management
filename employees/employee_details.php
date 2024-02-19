<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="../dashboard/dashboard.php">Library Management System</a>
	    <div class="collapse navbar-collapse" id="navbarNav">
	        <ul class="navbar-nav mr-auto">
	            <?php include "../fixed_scripts/nav_bar_tables.php";?>
	        </ul>
	        <div class="navbar-nav">
	            <a href="../fixed_scripts/logout.php" class="btn btn-primary mr-2">Log Out</a>
	        </div>
	    </div>
	</nav>

	<div class="container mt-5">
	    <div class="row">
	        <div class="col">
	            <h2 class="float-left">Employee Details</h2>
	        </div>
	    </div>

		<?php
		// Fetch author information based on ID (replace $authorId with the actual ID)
		$employee_id = $_GET['employee_id']; // Example ID, replace with actual ID
		$stmt = $conn->prepare("SELECT emp.name AS empName, position, emp.contact_info AS empCI, br.name AS brName FROM employees emp, library_branches br WHERE emp.branch_id = br.branch_id AND emp.employee_id = ?;");
		$stmt->bind_param("i", $employee_id);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
		    // Fetch author data
		    while($employee = $result->fetch_assoc()) {
		    	$empName = $employee["empName"];
		    	$position = $employee["position"];
		    	$empCI = $employee["empCI"];
		    	$brName = $employee["brName"];
		    }
		?>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<!-- Author profile picture -->
						<div class="card-body d-flex justify-content-center align-items-center">
							<img src="../dashboard/employees_icon.png" class="card-img-top" alt="Employee Picture" style="width: 192px; height: 192px; margin: 20px;">
						</div>
						<div class="card-body">
							<h2 class="card-title"><?php echo $empName; ?></h2>
							<p class="card-text"><?php echo "Position: ".$position; ?></p>
							<p class="card-text"><?php echo "Contact Info: ".$empCI; ?></p>
							<p class="card-text"><?php echo "Library Branch: ".$brName; ?></p>
						</div>
						<div><a href="<?php echo "employees_table.php"; ?>" class="btn btn-primary mr-2" style="margin-left: 660px; margin-bottom: 10px;">Go Back</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		} else {
		    echo "Author not found.";
		}
		?>

	    <!-- About :) -->
	    <?php include "../fixed_scripts/about.php";?>
	</div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
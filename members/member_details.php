<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
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
	            <h2 class="float-left">Member Details</h2>
	        </div>
	    </div>

		<?php
		// Fetch author information based on ID (replace $authorId with the actual ID)
		$member_id = $_GET['member_id']; // Example ID, replace with actual ID
		$stmt = $conn->prepare("SELECT name, contact_info FROM members WHERE member_id = ?;");
		$stmt->bind_param("i", $member_id);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
		    // Fetch author data
		    while($member = $result->fetch_assoc()) {
		    	$name = $member["name"];
		    	$contact_info = $member["contact_info"];
		    }
		?>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<!-- Author profile picture -->
						<div class="card-body d-flex justify-content-center align-items-center">
							<img src="../dashboard/members_icon.png" class="card-img-top" alt="Member Picture" style="width: 192px; height: 192px; margin: 20px;">
						</div>
						<div class="card-body">
							<h2 class="card-title"><?php echo $name; ?></h2>
							<p class="card-text"><?php echo "Contact Info: ".$contact_info; ?></p>
						</div>
						<div><a href="<?php echo "members_table.php"; ?>" class="btn btn-primary mr-2" style="margin-left: 660px; margin-bottom: 10px;">Go Back</a></div>
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
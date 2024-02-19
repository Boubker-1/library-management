<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Dashboard</title>
    <!-- Add your CSS stylesheets or Bootstrap CDN links here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fixed_scripts/style.css">
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
	
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>
		<div class="row">
		    <!-- Card for Authors table -->
		    <div class="col-md-2">
		        <a href="../authors/authors_table.php" class="card-link">
		            <div class="card">
		                <img src="authors_icon.png" class="card-img-top" alt="Authors">
		                <div class="card-body">
		                    <h5 class="card-title">Authors</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Books table -->
		    <div class="col-md-2">
		        <a href="../books/books_table.php" class="card-link">
		            <div class="card">
		                <img src="books_icon.png" class="card-img-top" alt="Books">
		                <div class="card-body">
		                    <h5 class="card-title">Books</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Borrowings table -->
		    <div class="col-md-2">
		        <a href="../borrowings/borrowings_table.php" class="card-link">
		            <div class="card">
		                <img src="borrowings_icon.png" class="card-img-top" alt="Borrowings">
		                <div class="card-body">
		                    <h5 class="card-title">Borrowings</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Employees table -->
		    <div class="col-md-2">
		        <a href="../employees/employees_table.php" class="card-link">
		            <div class="card">
		                <img src="employees_icon.png" class="card-img-top" alt="Employees">
		                <div class="card-body">
		                    <h5 class="card-title">Employees</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Fines table -->
		    <div class="col-md-2">
		        <a href="../fines/fines_table.php" class="card-link">
		            <div class="card">
		                <img src="fines_icon.png" class="card-img-top" alt="Fines">
		                <div class="card-body">
		                    <h5 class="card-title">Fines</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		</div>
		<div class="row">
		    <!-- Card for Genres table -->
		    <div class="col-md-2">
		        <a href="../genres/genres_table.php" class="card-link">
		            <div class="card">
		                <img src="genres_icon.png" class="card-img-top" alt="Genres">
		                <div class="card-body">
		                    <h5 class="card-title">Genres</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Branches table -->
		    <div class="col-md-2">
		        <a href="../branches/branches_table.php" class="card-link">
		            <div class="card">
		                <img src="branches_icon.png" class="card-img-top" alt="Branches">
		                <div class="card-body">
		                    <h5 class="card-title">Branches</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Members table -->
		    <div class="col-md-2">
		        <a href="../members/members_table.php" class="card-link">
		            <div class="card">
		                <img src="members_icon.png" class="card-img-top" alt="Members">
		                <div class="card-body">
		                    <h5 class="card-title">Members</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Publishers table -->
		    <div class="col-md-2">
		        <a href="../publishers/publishers_table.php" class="card-link">
		            <div class="card">
		                <img src="publishers_icon.png" class="card-img-top" alt="Publishers">
		                <div class="card-body">
		                    <h5 class="card-title">Publishers</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		    <!-- Card for Reservations table -->
		    <div class="col-md-2">
		        <a href="../reservations/reservations_table.php" class="card-link">
		            <div class="card">
		                <img src="reservations_icon.png" class="card-img-top" alt="Reservations">
		                <div class="card-body">
		                    <h5 class="card-title">Reservations</h5>
		                </div>
		            </div>
		        </a>
		    </div>
		</div>
	    <!-- About :) -->
	    <?php include "../fixed_scripts/about.php";?>
    </div>
    <!-- Add your JavaScript code or Bootstrap JS CDN links here -->
</body>
</html>

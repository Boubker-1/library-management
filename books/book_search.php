<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

	<div class="container mt-5">
	    <div class="row">
	        <div class="col">
	            <h2 class="float-left">Books List</h2>
	            <form class="form-inline float-right" action="book_search.php" method="GET">
	                <input class="form-control mr-sm-2" type="search" placeholder="Search by book title" aria-label="Search" name="searchTerm">
	                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	            </form>
	        </div>
	    </div>
	    <div class="row mt-3">
	        <div class="col">
	            <div class="button-container">
	                <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#addBookModal">Add a new book</button>
	            </div>
	        </div>
	    </div>


	    <!-- Table display and other code here -->
		<div class="table-responsive">
		    <table class="table table-striped">
		        <thead class="thead-dark">
		            <tr>
		                <th>ID</th><th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Publication Date</th><th>Availability</th><th>Update</th><th>Remove</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php
		            	if (isset($_GET['searchTerm'])) {
		            		$searchTerm = $_GET['searchTerm'];
		            		$sql = "SELECT * FROM books WHERE title LIKE '%" . $searchTerm . "%'";
		            	}
		            	else {
		            		$sql = "SELECT * FROM books";
		            	};
		            include "update_remove_modals.php";
		            ?>
		        </tbody>
		    </table>
		</div>

	    <!-- Add Book Modal -->
	    <?php include "add_book_modal.php";?>

	    <!-- About :) -->
	    <?php include "../fixed_scripts/about.php";?>
	</div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
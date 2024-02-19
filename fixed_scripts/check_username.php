<?php
	session_start(); // Start the session
	if (!isset($_SESSION['username'])) {
		header("Location: ../index.php");
		exit;
	}
?>
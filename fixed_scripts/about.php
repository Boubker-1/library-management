<?php
	echo "<style>";
	echo ".github-icon {";
	echo "width: 24px;"; /* Adjust as needed */
	echo "height: 24px;"; /* Adjust as needed */
	echo "vertical-align: middle;"; /* Align the icon vertically */
	echo "margin-left: 5px;"; /* Adjust as needed for spacing */
	echo "image-rendering: smooth;"; /* Enable antialiasing */
	echo "}";

	echo ".line_black {";
	echo "border-top: 3px solid black;"; /* Use border instead of height */
	echo "margin-top: 20px;";
	echo "margin-bottom: 20px;";
	echo "}";

	echo ".line_white {";
	echo "border-top: 3px solid white;"; /* Use border instead of height */
	echo "margin-top: 20px;";
	echo "margin-bottom: 20px;";
	echo "}</style>";

    echo "<div class='line_black'></div>"; //  <!-- Line here -->
	echo "<div class='made-by'>";
	echo "<span>Visit this project's GitHub repository </span>";
	echo "<a href='http://github.com/Boubker-1/library-management'' target='_blank'>";
	echo "<img src='../fixed_scripts/github_icon.png' alt='GitHub' class='github-icon'></a></div>";
    echo "<div class='line_white'></div>"; //  <!-- Line here -->
?>
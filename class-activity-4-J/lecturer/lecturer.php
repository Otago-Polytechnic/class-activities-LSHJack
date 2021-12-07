<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Lecturer Database</h2>
<ul>
	<li><a href="insert.php"><strong>Insert</strong></a> - Add a Lecturer</li>
	<li><a href="delete.php"><strong>Delete</strong></a> - Delete a Lecturer</li>
    <li><a href="update.php"><strong>Update</strong></a> - Edit a Lecturer</li>
    <li><a href="show.php"><strong>Find</strong></a> - Find a Lecturer</li>
    <li><a href="printall.php"><strong>Print All</strong></a> - Print All Lecturers</li>
	
</ul>

<a href="../index.php">Back to Home Page</a>

<?php require "../templates/footer.php"; ?>
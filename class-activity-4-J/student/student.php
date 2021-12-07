<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Student Database</h2>
<ul>
	<li><a href="insert.php"><strong>Insert</strong></a> - Add a Student</li>
	<li><a href="delete.php"><strong>Delete</strong></a> - Delete a Student</li>
    <li><a href="update.php"><strong>Update</strong></a> - Edit a Student</li>
    <li><a href="show.php"><strong>Find</strong></a> - Find a Student</li>
    <li><a href="printall.php"><strong>Print All</strong></a> - Print All Students</li>
</ul>

<a href="../index.php">Back to Home Page</a>

<?php require "../templates/footer.php"; ?>
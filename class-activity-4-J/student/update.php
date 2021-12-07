<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="update">
<h2>Update Student</h2>

<?php

$student = new Student();
    $student->printall("update");
    $student->db_close();

?>

</br><a href="student.php">Back to Student Page</a></br>
<a href="../index.php">Back to Home Page</a>

</div>

<?php require "../templates/footer.php"; ?>
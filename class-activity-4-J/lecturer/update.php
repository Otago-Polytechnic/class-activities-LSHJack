<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="update">
<h2>Update Lecturer</h2>

<?php

$lecturer = new Lecturer();
    $lecturer->printall("update");
    $lecturer->db_close();

?>

</br><a href="lecturer.php">Back to Lecturer Page</a></br>
<a href="index.php">Back to Home Page</a>
</div>
    
<?php require "../templates/footer.php"; ?>
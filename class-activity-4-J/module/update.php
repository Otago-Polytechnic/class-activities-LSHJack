<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="update">
<h2>Update Module</h2>

<?php

$module = new Module();
    $module->printall("update");
    $module->db_close();

?>

</br><a href="module.php">Back to Module Page</a></br>
<a href="../index.php">Back to Home Page</a>

</div>

<?php require "../templates/footer.php"; ?>
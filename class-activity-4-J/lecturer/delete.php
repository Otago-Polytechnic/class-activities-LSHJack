<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="delete">
<h2>Delete lecturer</h2>

<?php

$success = null;

if (isset($_POST["submit"])) {

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try{    
    $id = $_POST["submit"];

    $lecturer = new Lecturer();
    $lecturer->delete($id);
    $lecturer->db_close();
  } catch(PDOException $error) {
    echo $error->getMessage();
  }


    
    $success = "Lecturer ID {$id} deleted<br>";
  
}

$lecturer = new Lecturer();
    $lecturer->printall("delete");
    $lecturer->db_close();

?>

<br>
<?php if ($success) echo $success; ?>
<br>

<a href="lecturer.php">Back to Lecturer Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>
    

<?php require "../templates/footer.php"; ?>
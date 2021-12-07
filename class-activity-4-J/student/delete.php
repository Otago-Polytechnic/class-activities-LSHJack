<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="delete">
<h2>Delete Student</h2>

<?php

$success = null;

if (isset($_POST["submit"])) {

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try{    
    $id = $_POST["submit"];

    $student = new Student();
    $student->delete($id);
    $student->db_close();
  } catch(PDOException $error) {
    echo $error->getMessage();
  }

    $success = "STID  {$id} student deleted<br>";
  
}

$student = new Student();
    $student->printall("delete");
    $student->db_close();

?>

<br>
<?php if ($success) echo $success; ?>
<br>

<a href="student.php">Back to Student Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>
    
<?php require "../templates/footer.php"; ?>
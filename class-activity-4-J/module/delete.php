<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="delete">
<h2>Delete Module</h2>

<?php

$success = null;

if (isset($_POST["submit"])) {

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try{    
    $id = $_POST["submit"];

    $module = new Module();
    $module->delete($id);
    $module->db_close();
  } catch(PDOException $error) {
    echo $error->getMessage();
  }

    $success = "MID  {$id} module deleted<br>";
  
}

$module = new Module();
    $module->printall("delete");
    $module->db_close();

?>

<br>
<?php if ($success) echo $success; ?>
<br>


<a href="module.php">Back to Module Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>
    

<?php require "../templates/footer.php"; ?>
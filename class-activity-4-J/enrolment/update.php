<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="update">
<h2>Update Mark</h2>
<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="stid">Student ID</label>
      <input type="text" name="stid" id="stid">
      <label for="mid">Module ID</label>
      <input type="text" name="mid" id="mid">
      <label for="block">Block</label>
      <input type="text" name="block" id="block">
      <label for="mark">Mark</label>
      <input type="text" name="mark" id="mark">
      <input type="submit" name="submit" value="Update">
</form>

<?php

$success = null;

if (isset($_POST["submit"])) {

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try{

    $enrolment = new Enrolment();
    $enrolment->update($_POST["stid"],$_POST["mid"],$_POST["block"],$_POST["mark"]);
    $enrolment->db_close();
  } catch(PDOException $error) {
    echo $error->getMessage();
  }

  $success = "Update deleted<br>";
}

?>

<br>
<?php if ($success) echo $success; ?>
<br>

</br><a href="enrolment.php">Back to Enrolment Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>
    
<?php require "../templates/footer.php"; ?>
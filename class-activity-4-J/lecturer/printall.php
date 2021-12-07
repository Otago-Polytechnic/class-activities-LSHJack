<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="printall">
    <h2>Print All Lecturer Records</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <input type="submit" name="printall" value="PrintAll">
    </form>
    <br>
    <a href="lecturer.php">Back to Lecturer Page</a></br>
    <a href="../index.php">Back to Home Page</a></br></br>

    <?php
if (isset($_POST['printall'])) {
  ?>
  <?php
    $lecturer = new Lecturer();
    $lecturer->printall("printall");
    $lecturer->db_close();

      }
  ?>
</div>    

<?php require "../templates/footer.php"; ?>
<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="printall">
    <h2>Print All Student Records</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <input type="submit" name="printall" value="PrintAll">
    </form>
    <br>
    <a href="student.php">Back to Student Page</a></br>
    <a href="../index.php">Back to Home Page</a></br></br>

    <?php
if (isset($_POST['printall'])) {
  ?>
  <?php
    $student = new Student();
    $student->printall("printall");
    $student->db_close();

      }
  ?>
</div>    

<?php require "../templates/footer.php"; ?>
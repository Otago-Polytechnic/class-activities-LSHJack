<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="printall">
    <h2>Print All Module Records</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <input type="submit" name="printall" value="PrintAll">
    </form>
    <br>
    <a href="module.php">Back to Module Page</a></br>
    <a href="../index.php">Back to Home Page</a></br></br>

    <?php
if (isset($_POST['printall'])) {
  ?>
  <?php
    $module = new Module();
    $module->printall("printall");
    $module->db_close();

      }
  ?>
</div>    

<?php require "../templates/footer.php"; ?>
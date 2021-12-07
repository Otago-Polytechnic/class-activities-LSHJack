<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="insert">
<?php
if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  
    try  {
      $module = new Module();
      $module->insert($_POST['id'],$_POST['name'], $_POST['credit'],
        $_POST['level']);
      $module->db_close();

    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

?>
  
<h2>Add a New Module</h2>
  
<form method="post">
<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
<label for="id">Module ID</label>
<input type="text" name="id" id="id">
<label for="name">Name</label>
<input type="text" name="name" id="name">
<label for="credit">Credit</label>
<input type="text" name="credit" id="credit">
<label for="level">Level</label>
<input type="text" name="level" id="level">
<input type="submit" name="submit" value="Submit">
</form>
  
</br><a href="module.php">Back to Module Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>

<?php require "../templates/footer.php"; ?>
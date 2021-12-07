<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="update">
<?php
if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  
    try  {
      $module = new Module();
      $statement= $module->update($_POST['MID'],$_POST['name'], $_POST['credit'],$_POST['level']);
      $module->db_close();

    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

?>

<?php      
if (isset($_GET['id'])) {
  
    $module = new Module();
    $id = $_GET['id'];
    $name = $module->show($id);
    $module->db_close(); 

} else {
    echo "Error";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo escape($_POST['name']); ?> updated</blockquote>
<?php endif; ?>

<h2>Edit a Module</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($name as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>

</br><a href="module.php">Back to Module Page</a></br>
<a href="../index.php">Back to Home Page</a>

<?php require "../templates/footer.php"; ?>

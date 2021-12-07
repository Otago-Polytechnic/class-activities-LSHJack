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
      $lecturer = new Lecturer();
      $statement= $lecturer->update($_POST['LID'],$_POST['firstname'], $_POST['lastname'],$_POST['email'], $_POST['address'],$_POST['salary'], $_POST['qualification']);
      $lecturer->db_close();

    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

  ?>

<?php      
if (isset($_GET['id'])) {
  
    $lecturer = new Lecturer();
    $id = $_GET['id'];
    //echo "id=". $id;
    $user = $lecturer->show($id);
    $lecturer->db_close();
    
  //var_export($user);  
  
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo escape($_POST['firstname']); ?> updated</blockquote>
<?php endif; ?>

<h2>Edit a Lecturer</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>

    </br><a href="lecturer.php">Back to Lecturer Page</a></br>
    <a href="../index.php">Back to Home Page</a>

<?php require "../templates/footer.php"; ?>

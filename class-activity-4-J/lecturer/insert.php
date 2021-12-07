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
      $lecturer = new Lecturer();
      $lecturer->insert($_POST['id'],$_POST['firstname'], $_POST['lastname'],
        $_POST['email'], $_POST['address'],$_POST['salary'], $_POST['qualification']);
      $lecturer->db_close();

    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

  ?>
  
    <h2>Add a new lecturer</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="id">Lecturer ID</label>
      <input type="text" name="id" id="id">
      <label for="firstname">First Name</label>
      <input type="text" name="firstname" id="firstname">
      <label for="lastname">Last Name</label>
      <input type="text" name="lastname" id="lastname">
      <label for="email">Email Address</label>
      <input type="text" name="email" id="email">
      <label for="address">address</label>
      <input type="text" name="address" id="address">
      <label for="salary">Salary</label>
      <input type="text" name="salary" id="salary">
      <label for="qualification">Qualification</label>
      <input type="text" name="qualification" id="qualification">
      <input type="submit" name="submit" value="Submit">
    </form>
  
</br><a href="lecturer.php">Back to Lecturer Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>

<?php require "../templates/footer.php"; ?>
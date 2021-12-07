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
      $student = new Student();
      $student->insert($_POST['id'],$_POST['firstname'], $_POST['lastname'],
        $_POST['email'], $_POST['address']);
      $student->db_close();

    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

  ?>
  
    <h2>Add a Student</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="id">Student ID</label>
      <input type="text" name="id" id="id">
      <label for="firstname">First Name</label>
      <input type="text" name="firstname" id="firstname">
      <label for="lastname">Last Name</label>
      <input type="text" name="lastname" id="lastname">
      <label for="email">Email Address</label>
      <input type="text" name="email" id="email">
      <label for="address">address</label>
      <input type="text" name="address" id="address">
      <input type="submit" name="submit" value="Submit">
    </form>
  
</br><a href="student.php">Back to Student Page</a></br>
    <a href="../index.php">Back to Home Page</a>
</div>

<?php require "../templates/footer.php"; ?>
<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Show a user</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="id">Student ID</label>
      <input type="text" name="id" id="id">
      <input type="submit" name="submit" value="Show">
</form>

<div id="show">
<?php
if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  
    try  {
      $student = new Student();
      $row = $student->show($_POST['id']);
      $student->db_close();
      
      if($row===null) echo $_POST['id']. "is not found."."<br>";
      else {
      ?>
        <table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Address</th>
             </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo escape($row["stid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["address"]); ?></td>
    
      </tr>
    
    </tbody>
    </table>
    <?php } ?>
    <?php
    } catch(PDOException $error) {
        echo $error->getMessage();
    } 
  }

  ?>

</div>

</br><a href="student.php">Back to Student Page</a></br>
<a href="../index.php">Back to Home Page</a>

<br>
<?php require "../templates/footer.php"; ?>
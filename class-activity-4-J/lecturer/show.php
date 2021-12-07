<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Show a Lecturer</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="id">Lecturer ID</label>
      <input type="text" name="id" id="id">
      <input type="submit" name="submit" value="Show">
</form>

<div id="show">
<?php
if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  
    try  {
      $lecturer = new Lecturer();
      $row = $lecturer->show($_POST['id']);
      $lecturer->db_close();
      
      if($row===null) echo $_POST['id']. "is not found."."<br>";
      else {
      ?>
        <table>
    <thead>
        <tr>
            <th>Lecturer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Qualification</th>
             </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo escape($row["lid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["address"]); ?></td>
            <td><?php echo escape($row["salary"]); ?></td>
            <td><?php echo escape($row["qualification"]); ?></td>
    
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

</br><a href="lecturer.php">Back to Lecturer Page</a></br>
<a href="../index.php">Back to Home Page</a>

<br>
<?php require "../templates/footer.php"; ?>
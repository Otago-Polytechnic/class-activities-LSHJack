<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Show Student Enrolments</h2>

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
      $enrolment = new Enrolment();
      $result = $enrolment->show($_POST['id']);
      $enrolment->db_close();
      
      if($result->num_rows===0) echo $_POST['id']. "not found"."<br>";
      else {
      ?>
        <table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Module ID</th>
            <th>Name</th>
            <th>Block</th>
            <th>Mark</th>
             </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) : ?>
                
        <tr>
            <td><?php echo escape($row["stid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["mid"]); ?></td>
            <td><?php echo escape($row["name"]); ?></td>
            <td><?php echo escape($row["block"]); ?></td>
            <td><?php echo escape($row["mark"]); ?></td>
    
      </tr>
        <?php endwhile; ?>
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
<a href="enrolment.php">Back to Enrolment Page</a></br>
<a href="../index.php">Back to Home Page</a>
<br>
<?php require "../templates/footer.php"; ?>
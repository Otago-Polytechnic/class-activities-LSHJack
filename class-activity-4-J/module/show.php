<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<h2>Show a Module</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="id">Module ID</label>
      <input type="text" name="id" id="id">
      <input type="submit" name="submit" value="Show">
</form>

<div id="show">
<?php
if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  
    try  {
      $module = new Module();
      $row = $module->show($_POST['id']);
      $module->db_close();
      
      if($row===null) echo $_POST['id']. "is not found."."<br>";
      else {
      ?>
        <table>
    <thead>
        <tr>
            <th>Module ID</th>
            <th>Name</th>
            <th>Credit</th>
            <th>Level</th>
            
             </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo escape($row["MID"]); ?></td>
            <td><?php echo escape($row["name"]); ?></td>
            <td><?php echo escape($row["credit"]); ?></td>
            <td><?php echo escape($row["level"]); ?></td>

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

</br><a href="module.php">Back to Module Menu</a></br>
<a href="../index.php">Back to Home Page</a>

<br>
<?php require "../templates/footer.php"; ?>
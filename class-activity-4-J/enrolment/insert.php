<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="insert">
<?php
if (isset($_POST['submit']))
{
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    try
    {
        $enrolment = new Enrolment();
        $enrolment->insert($_POST['stid'], $_POST['mid'], $_POST['lid'], $_POST['block']);
        $enrolment->db_close();

    }
    catch(PDOException $error)
    {
        echo $error->getMessage();
    }
}

?>
  
    <h2>Add a New Enrolment</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="stid">Student ID</label>
      <input type="text" name="stid" id="stid">
      <label for="mid">Module ID</label>
      <input type="text" name="mid" id="mid">
      <label for="lid">Lecturer ID</label>
      <input type="text" name="lid" id="lid">
      <label for="block">Block</label>
      <input type="text" name="block" id="block">
      <input type="submit" name="submit" value="Submit">
    </form>
  
</br><a href="enrolment.php">Back to Enrolment Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>

<?php require "../templates/footer.php"; ?>

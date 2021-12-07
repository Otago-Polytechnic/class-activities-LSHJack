<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="printall">
    <h2>Show All Enrolments</h2>
  
    <form method="post">
      <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <input type="submit" name="printall" value="PrintAll">
    </form>
    <br>
    <a href="enrolment.php">Back to Enrolment Page</a></br>
    <a href="../index.php">Back to Home Page</a></br></br>

<?php
if (isset($_POST['printall']))
{
?>
<?php
    $enrolment = new Enrolment();
    $enrolment->printall("printall");
    $enrolment->db_close();
}
?>
</div>    

<?php require "../templates/footer.php"; ?>

<?php
require "../common.php";
require "../templates/header.php";
require "../class.php";
?>

<div id="delete">
<h2>Delete Enrolment</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="stid">Student ID</label>
      <input type="text" name="stid" id="stid">
      <label for="mid">Module ID</label>
      <input type="text" name="mid" id="mid">
      <label for="block">Block</label>
      <input type="text" name="block" id="block">
      <input type="submit" name="submit" value="Delete">
</form>

<?php
$success = null;

if (isset($_POST["submit"]))
{
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    try
    {

        $enrolment = new Enrolment();
        $enrolment->delete($_POST["stid"], $_POST["mid"], $_POST["block"]);
        $enrolment->db_close();
    }
    catch(PDOException $error)
    {
        echo $error->getMessage();
    }

    $success = "Enrolment deleted<br>";
}

?>

<br>
<?php if ($success) echo $success; ?>
<br>

<a href="enrolment.php">Back to Enrolment Page</a></br>
<a href="../index.php">Back to Home Page</a>
</div>
    
<?php require "../templates/footer.php"; ?>

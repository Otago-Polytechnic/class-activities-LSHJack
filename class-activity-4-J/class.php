<?php
//require "../config.php";
class OPDBS{
    protected $conn;

    public function __construct() { 
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "enrolment";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
		
        if ($this->conn->connect_error)
            die("Connection failed: " . $this->conn->connect_error);
    }

    public function db_close(){
        $this->conn->close();
    }
    
}

class Student extends OPDBS {
    
    public function insert($stid,$firstname,$lastname,$email,$address){
        $sql = "INSERT INTO student VALUES(?,?,?,?,?)";
        
        $stmt = $this->conn->prepare($sql);
        //Bind parameters to int string string string string
        $stmt->bind_param("issss",$stid,$firstname,$lastname,$email,$address);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->affected_rows === 1 ) {
            echo "New data inserted";
            } else {
            echo "Error: ";
            }
    }
    
    public function show($id){
        $sql = "SELECT * FROM student WHERE stid = ?";
        $statement =$this->conn->prepare($sql);
        
        $en=(int)$id;
        $statement->bind_param("i", $en);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        return $row;

    }

    public function delete($id){

    try{
    $sql = "DELETE FROM student WHERE stid = ?";

    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

    public function update($stid,$firstname,$lastname,$email,$address){
    try{
        $sql = "UPDATE student 
            SET stid = ?, 
              firstname = ?, 
              lastname = ?, 
              email = ?, 
              address = ?
            WHERE stid = ?";
     $statement = $this->conn->prepare($sql);
     $statement->bind_param("issssi",$stid,$firstname,$lastname,$email,$address,$stid);
     $statement->execute();
     return $statement;
    } catch(PDOException $error) {
         echo $sql . "<br>" . $error->getMessage();
     }
   }
     
      

    public function printall($mode){
        $sql = "SELECT * FROM student";
        $result = $this->conn->query($sql);
?>

    <form method="post">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["stid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["address"]); ?></td>
    <?php if($mode==="delete") : ?>
        <td><button type="submit" name="submit" value="<?php echo escape($row["stid"]); ?>">Delete</button></td>
    <?php elseif($mode==="update") : ?>
        <td><a href="update-single.php?id=<?php echo escape($row["stid"]); ?>">Edit</a></td>
    <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
    } 


}
?>

<?php 
class Module extends OPDBS {
    
    public function insert($mid,$name,$credit,$level){
        $sql = "INSERT INTO module VALUES(?,?,?,?)";
        
        $stmt = $this->conn->prepare($sql);
        //Bind parameters to string string int int
        $stmt->bind_param("ssii",$mid,$name,$credit,$level);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->affected_rows === 1 ) {
            echo "New data inserted";
            } else {
            echo "Error: ";
            }
    }
    
    public function show($id){
        $sql = "SELECT * FROM module WHERE mid = ?";
        $statement =$this->conn->prepare($sql);
        
        $statement->bind_param("s", $id);
        $statement->execute();
        $result = $statement->get_result();

        $row = $result->fetch_assoc();
        return $row;

    }

    public function delete($id){

    try{
    $sql = "DELETE FROM module WHERE mid = ?";

    $statement = $this->conn->prepare($sql);
    $statement->bind_param("s", $id);
    $statement->execute();


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

    public function update($mid,$name,$credit,$level){
    try{
        $sql = "UPDATE module 
            SET mid = ?, 
              name = ?, 
              credit = ?, 
              level = ? 
            WHERE mid = ?";
     $statement = $this->conn->prepare($sql);
     $statement->bind_param("ssiis",$mid,$name,$credit,$level,$mid);
     $statement->execute();
     return $statement;
    } catch(PDOException $error) {
         echo $sql . "<br>" . $error->getMessage();
     }
   }
     
      

    public function printall($mode){
        $sql = "SELECT * FROM module";
        $result = $this->conn->query($sql);
?>

    <form method="post">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["mid"]); ?></td>
            <td><?php echo escape($row["name"]); ?></td>
            <td><?php echo escape($row["credit"]); ?></td>
            <td><?php echo escape($row["level"]); ?></td>
            
    <?php if($mode==="delete") : ?>
        <td><button type="submit" name="submit" value="<?php echo escape($row["mid"]); ?>">Delete</button></td>
    <?php elseif($mode==="update") : ?>
        <td><a href="update-single.php?id=<?php echo escape($row["mid"]); ?>">Edit</a></td>
    <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
    } 


}
?>

<?php
class Lecturer extends OPDBS {
    
    public function insert($lid,$firstname,$lastname,$email,$address,$salary,$qualification){
        $sql = "INSERT INTO lecturer VALUES(?,?,?,?,?,?,?)";
        
        $stmt = $this->conn->prepare($sql);
        //Bind parameters to int string string string string int string
        $stmt->bind_param("issssis",$lid,$firstname,$lastname,$email,$address,$salary,$qualification);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->affected_rows === 1 ) {
            echo "New data inserted";
            } else {
            echo "Error: ";
            }
    }
    
    public function show($id){
        $sql = "SELECT * FROM lecturer WHERE lid = ?";
        $statement =$this->conn->prepare($sql);
        
        $en=(int)$id;
        $statement->bind_param("i", $en);
        $statement->execute();
        $result = $statement->get_result();

        $row = $result->fetch_assoc();
        return $row;

    }

    public function delete($id){

    try{
    $sql = "DELETE FROM lecturer WHERE lid = ?";

    $statement = $this->conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

    public function update($lid,$firstname,$lastname,$email,$address,$salary,$qualification){
    try{
        $sql = "UPDATE lecturer 
            SET lid = ?, 
              firstname = ?, 
              lastname = ?, 
              email = ?, 
              address = ?,
              salary = ?,
              qualification = ?
            WHERE lid = ?";
     $statement = $this->conn->prepare($sql);
     $statement->bind_param("issssisi",$lid,$firstname,$lastname,$email,$address,$salary, $qualification,$lid);
     $statement->execute();
     return $statement;
    } catch(PDOException $error) {
         echo $sql . "<br>" . $error->getMessage();
     }
   }
     
      

    public function printall($mode){
        $sql = "SELECT * FROM lecturer";
        $result = $this->conn->query($sql);
?>

    <form method="post">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["lid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["address"]); ?></td>
            <td><?php echo escape($row["salary"]); ?></td>
            <td><?php echo escape($row["qualification"]); ?></td>
    <?php if($mode==="delete") : ?>
        <td><button type="submit" name="submit" value="<?php echo escape($row["lid"]); ?>">Delete</button></td>
    <?php elseif($mode==="update") : ?>
        <td><a href="update-single.php?id=<?php echo escape($row["lid"]); ?>">Edit</a></td>
    <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
    } 


}
?>

<?php
class Enrolment extends OPDBS {
    
    public function insert($stid,$mid,$lid,$block){
        $sql = "INSERT INTO enrolment (stid, mid, lid, block) VALUES(?,?,?,?)";
        
        $stmt = $this->conn->prepare($sql);
        //Bind parameters to int string int int
        $stmt->bind_param("isii",$stid,$mid,$lid,$block);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->affected_rows === 1 ) {
            echo "New data inserted";
            } else {
            echo "Error: ";
            }
    }
    
    public function show($stid){
        $sql = "SELECT student.stid, student.firstname, student.lastname, 
        enrolment.mid, module.name, enrolment.block, enrolment.mark 
        FROM student
        INNER JOIN enrolment
        ON student.stid =  enrolment.stid
        INNER JOIN module
        ON enrolment.mid = module.mid
        WHERE enrolment.stid = ? ";
        $statement =$this->conn->prepare($sql);
        
        $en=(int)$stid;
        $statement->bind_param("i", $en);
        $statement->execute();
        $result = $statement->get_result();

        return $result;

    }

    public function delete($stid,$mid,$block){

    try{
    $sql = "DELETE FROM enrolment WHERE stid = ? AND mid = ? AND block = ?";

    $statement = $this->conn->prepare($sql);
    $statement->bind_param("isi", $stid,$mid,$block);
    $statement->execute();


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

    public function update($stid,$mid,$block,$mark){
    try{
        $sql = "UPDATE enrolment
            SET mark = ?
            WHERE stid = ? AND mid = ? AND block = ?";

     $statement = $this->conn->prepare($sql);
     $statement->bind_param("iisi", $mark,$stid,$mid,$block);
     $statement->execute();
     return $statement;
    } catch(PDOException $error) {
         echo $sql . "<br>" . $error->getMessage();
     }
   }
     
      

    public function printall($mode){
        $sql = "SELECT student.stid, student.firstname, student.lastname, 
        enrolment.mid, module.name, enrolment.block, enrolment.mark 
        FROM student
        INNER JOIN enrolment
        ON student.stid =  enrolment.stid
        INNER JOIN module
        ON enrolment.mid = module.mid";
        $result = $this->conn->query($sql);
?>

    <form method="post">
        <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
        <table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Module ID</th>
            <th>Module Name</th>
            <th>Block</th>
            <th>Mark</th>
             </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["stid"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["mid"]); ?></td>
            <td><?php echo escape($row["name"]); ?></td>
            <td><?php echo escape($row["block"]); ?></td>
            <td><?php echo escape($row["mark"]); ?></td>
    <?php if($mode==="delete") : ?>
        <td><button type="submit" name="submit" value="<?php echo escape($row["lid"]); ?>">Delete</button></td>
    <?php elseif($mode==="update") : ?>
        <td><a href="update-single.php?id=<?php echo escape($row["lid"]); ?>">Edit</a></td>
    <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
    } 


}
?>

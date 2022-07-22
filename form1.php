<?php
include ('connect.php');
$name = $department = $rollno = $hostelnumber = '';

$errors = array('Name'=>'', 'Rollno'=>'', 'department'=>'', 'Hnumber'=>'');

if(isset($_POST['submit'])){
   if (empty($_POST['Name'])){
       $errors['Name'] = 'Student Name is required';
    } else {
       $name = htmlspecialchars($_POST['Name']);
    }
    if (empty($_POST['Rollno'])){
    $errors['Rollno'] = 'Roll number is required';
    } else {
    $rollno = htmlspecialchars($_POST['Rollno']);
    }
    if (empty($_POST['department'])){
    $errors['department'] = 'Department is required';
    } else {
    $department = htmlspecialchars($_POST['department']);
    }
    if (empty($_POST['Hnumber'])){
    $errors['Hnumber'] = 'Hostel number is required';
    } else {
    $hostelnumber = htmlspecialchars($_POST['Hnumber']);
    }

    if(array_filter($errors)){
    } else {
        $name = mysqli_real_escape_string($connection, $_POST['Name']);
        $rollno = mysqli_real_escape_string($connection, $_POST['Rollno']);
        $department = mysqli_real_escape_string($connection, $_POST['department']);
        $hostelnumber = mysqli_real_escape_string($connection, $_POST['Hnumber']);
        
        $insert = "INSERT INTO Infostudents(Name, Rollno, Department, HostelNumber) VALUES('$name', '$rollno', '$department', '$hostelnumber')";
        if (mysqli_query($connection, $insert))
        {
            header('Location: index2.php');
        }
        else
        {
            echo 'Error accessing the database : ' . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include ("header.php") ?>
    <h2 class="h">Add Student Details</h2>
    <section class="container">
    <form class="form" action="form1.php" method="POST">
        <label><h3>Student Name :</h3></label>
        <input style= "font-size:20px;" class="name" type= "text" name ="Name" placeholder="Enter Student Name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="errors"> <?php echo $errors['Name']?></div>
        <label><h3>Roll Number :</h3></label>
        <input style= "font-size:20px;" class="name"type= "text" name="Rollno" placeholder="Type Roll number" value="<?php echo htmlspecialchars($rollno) ?>">
        <div class="errors"> <?php echo $errors['Rollno']?></div>
        <label><h3>Department :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="department" placeholder="Mention the department" value="<?php echo htmlspecialchars($department) ?>">
        <div class="errors"> <?php echo $errors['department']?></div>
        <label><h3>Hostel Number :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="Hnumber" placeholder="Type 'H' and number together, Ex: H6 " value="<?php echo htmlspecialchars($hostelnumber) ?>">
        <div class="errors"> <?php echo $errors['Hnumber']?></div>
        <div class="h">
            <input type="submit" name="submit" value="Submit" class="submit">
        </div>
    </form>
</section>

    <?php include ("footer.php") ?>
</html>

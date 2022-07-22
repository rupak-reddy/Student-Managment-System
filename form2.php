<?php
include('connect.php');
if(isset($_POST['modify'])){
	$idnew = $_POST['id_modify'];
	
	$querynew = "SELECT * FROM Infostudents WHERE ID=$idnew";
	$result = mysqli_query($connection, $querynew);
	$data = mysqli_fetch_assoc($result);
	}
}

if(isset($_POST['submit'])){
	date_default_timezone_set('Asia/Calcutta');

		$na = htmlspecialchars($_POST['name']);
		$ro = htmlspecialchars($_POST['rollno']);
		$depart = htmlspecialchars($_POST['department']);
		$hosnum = htmlspecialchars($_POST['hnumber']);
		$dat = date("Y-m-d H:i:s");
		$idf = htmlspecialchars($_POST['id']);
        
        $insert = "INSERT INTO Infostudents(Name, Rollno, Department, HostelNumber) VALUES('$na', '$ro', '$depart', '$hosnum')";
        $delete = "DELETE FROM Infostudents WHERE ID=$idf";
        if (mysqli_query($connection, $insert))
        {
        	if(mysqli_query($connection, $delete)){
            header('Location: index2.php');
        }
        }
        else
        {
            echo 'Error accessing the database : ' . mysqli_error($connection);
        }




	}

?>
	<!DOCTYPE html>
	<html>
	<?php include ('header.php') ?>

		<h2 class="h">Update Student Details</h2>
    <section class="container">
    <form class="form" action="form2.php" method="POST">
        <label><h3>Student Name :</h3></label>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['ID']); ?>">
        <input style= "font-size:20px;" class="name" type= "text" name ="name" placeholder="Enter Student Name" value="<?php echo htmlspecialchars($data['Name']) ?>">
        <div class="errors"> <?php echo $errors['Name']?></div>
        <label><h3>Roll Number :</h3></label>
        <input style= "font-size:20px;" class="name"type= "text" name="rollno" placeholder="Type Roll number" value="<?php echo htmlspecialchars($data['Rollno']) ?>">
        <div class="errors"> <?php echo $errors['Rollno']?></div>
        <label><h3>Department :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="department" placeholder="Mention the department" value="<?php echo htmlspecialchars($data['Department']) ?>">
        <div class="errors"> <?php echo $errors['department']?></div>
        <label><h3>Hostel Number :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="hnumber" placeholder="Type 'H' and number together, Ex: H6 " value="<?php echo htmlspecialchars($data['HostelNumber']) ?>">
        <div class="errors"> <?php echo $errors['Hnumber']?></div>
        <div class="h">
            <input type="submit" name="submit" value="Update" class="submit">
        </div>
    </form>
</section>

		<?php include ('footer.php'); ?>


</html>



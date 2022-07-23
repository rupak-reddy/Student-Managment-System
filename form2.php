<?php
include('connect.php');
if(isset($_POST['modify'])){
    $idnew = $_POST['id_modify'];
    $query = "SELECT * FROM Infostudents WHERE ID=$idnew";
    $querycon = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($querycon);
    
}

if(isset($_POST['submit'])){
    date_default_timezone_set("Asia/Calcutta");
    $id = $_POST['id'];
    $na = htmlspecialchars($_POST['name']);
    $ro = htmlspecialchars($_POST['rollno']);
    $depart = htmlspecialchars($_POST['department']);
    $dat = date("Y-m-d H:i:s");
    $hosnum = htmlspecialchars($_POST['hnumber']);

    $quw = "UPDATE Infostudents SET Name='$na', Rollno = '$ro', Department = '$depart', HostelNumber = '$hosnum', `Added at` = '$dat' WHERE ID='$id' ";
    $cond = mysqli_query($connection, $quw);
    if($cond){
        header('Location: index2.php');
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
        <input style= "font-size:20px;" class="name" type= "text" name ="name" placeholder="Enter Student Name" value="<?php echo htmlspecialchars($data['Name']) ?>" required>

        <label><h3>Roll Number :</h3></label>
        <input style= "font-size:20px;" class="name"type= "text" name="rollno" placeholder="Type Roll number" value="<?php echo htmlspecialchars($data['Rollno']) ?>" required>

        <label><h3>Department :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="department" placeholder="Mention the department" value="<?php echo htmlspecialchars($data['Department']) ?>" required>

        <label><h3>Hostel Number :</h3></label>
        <input style= "font-size:20px;" class="name"type="text" name="hnumber" placeholder="Type 'H' and number together, Ex: H6 " value="<?php echo htmlspecialchars($data['HostelNumber']) ?>" required>

        <div class="h">
            <input type="submit" name="submit" value="Update" class="submit">
        </div>
    </form>
</section>

		<?php include ('footer.php'); ?>


</html>



<?php
include('connect.php');
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $data = "SELECT * FROM Infostudents WHERE ID = $id";
    $query = mysqli_query($connection, $data);
    $fetch = mysqli_fetch_assoc($query);
    mysqli_free_result($query);
    mysqli_close($connection);
}


if(isset($_POST['delete'])){
    $id_deleting = mysqli_real_escape_string($connection, $_POST['id_of_deleting_info']);
    $data_deleting = "DELETE FROM Infostudents WHERE ID=$id_deleting";
    if(mysqli_query($connection, $data_deleting)){
        header('Location: index2.php');
    } else {
        echo 'Error deleting the details';
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include ('header.php') ?>
    <?php if($fetch) { ?>
    <h2 class="details">Name : <?php echo htmlspecialchars($fetch['Name']); ?> </h2>
    <h2 class="details">Roll Number : <?php echo htmlspecialchars($fetch['Rollno']); ?> </h2>
    <h2 class="details">Department : <?php echo htmlspecialchars($fetch['Department']); ?> </h2>
    <h2 class="details">Hostel : <?php echo htmlspecialchars($fetch['HostelNumber']); ?> </h2>
    <h2 class="details">Details Last Modified : <?php echo $fetch['Added at']; ?> </h2>

    <form action="form2.php" method="POST">
        <input type="hidden" name="id_modify" value="<?php echo htmlspecialchars($fetch['ID']); ?>">
        <div class="h">
            <input type="submit" name="modify" value="Modify" class="modify">
        </div>
    </form>




    <form action="individualDetails.php" method="POST">
        <input type="hidden" name="id_of_deleting_info" value="<?php echo htmlspecialchars($fetch['ID']); ?>">
        <div class="h">
        <input type="submit" name="delete" value="Delete" class="delete">
        </div>
    </form>

    <?php } else { ?>
        <?php header('Location: index2.php'); ?>
        
    <?php } ?>


    <?php include ('footer.php') ?>
</html>
    
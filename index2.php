<?php

include ('connect.php');

$data = 'SELECT * FROM Infostudents ORDER BY Name';
$query = mysqli_query($connection, $data);
$fetch = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_free_result($query);
mysqli_close($connection);
$i = 1;

?>

<!DOCTYPE html>
<html>
    <?php include ("header.php") ?>
    <a href="form1.php"><button class="button">Add Student Details</button></a>
    <table class="table">
        <tr class="tr">
            <th class="th">S.No</th>
            <th class="th">Student Name</th>
            <th class="th">Roll Number</th>
            <th class="th">Department</th>
            <th class="th">Hostel</th>
            <th class="th">Details added at</th>
            <th></th>
        </tr>
        <?php foreach ($fetch as $information) { ?>
        <tr class="tr">
            <td class="td"><?php echo $i;?></td>
            <td class="td"><?php echo htmlspecialchars($information['Name']);?></td>
            <td class="td"><?php echo htmlspecialchars($information['Rollno']);?></td>
            <td class="td"><?php echo htmlspecialchars($information['Department']);?></td>
            <td class="td"><?php echo htmlspecialchars($information['HostelNumber']);?></td>
            <td class="td"><?php echo htmlspecialchars($information['Added at']);?></td>
            <td><a href="individualDetails.php?id=<?php echo $information['ID'] ?>"> Modify/Delete </a></td>
            <?php $i++; ?>
            <?php } ?>
        </tr>
    </table>
    <?php include ("footer.php") ?>
        
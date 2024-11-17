<?php
include 'uheader.php'; 
include 'dbconfig.php'; 
session_start();


$sql = "SELECT id, type_name FROM leave_types";
$result = $conn->query($sql);
?>

<header><h1>Add Leave</h1></header>
<form method="POST" action="addleave.php" class="form-group">
    <label for="leave_type_id">Leave Type:</label>
    <select id="leave_type_id" name="leave_type_id" required>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['type_name']."</option>";
            }
        } else {
            echo "<option value=''>No leave types available</option>";
        }
        ?>
    </select><br>
    
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required/><br>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required/><br>
    
    <label for="reason">Reason:</label>
    <textarea id="reason" name="reason" required></textarea><br>
    
    <input type="submit" name="add_leave" value="Add Leave"/> <br>
</form>
</body>
</html>

<?php
if (isset($_POST['add_leave'])) {
    $user_id = $_SESSION['username']; 
    $leave_type_id = $_POST['leave_type_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO `leaves`(`userid`, `leavetypeid`, `startdate`, `enddate`, `reason`, `status`)  VALUES ('$user_id', '$leave_type_id', '$start_date', '$end_date', '$reason', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Leave added successfully')</script>";
        echo "<meta http-equiv='refresh' content='0;addleave.php'>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close database connection
}
?>

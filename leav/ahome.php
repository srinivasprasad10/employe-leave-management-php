<?php
include 'aheader.php'; // Include header or any necessary files for the admin
include 'dbconfig.php'; // Include database configuration
session_start();

// Check if admin is logged in
if (!isset($_SESSION['ausername'])) {
    header("Location: admin_login.php"); // Redirect to admin login page if not logged in
    exit();
}

// Fetch pending leaves with employee names from the database
$sql = "SELECT leaves.id, leaves.userid, leaves.leavetypeid, leaves.startdate, leaves.enddate, leaves.reason, leaves.status, 
               leave_types.type_name, employee.name as employee_name 
        FROM leaves 
        JOIN leave_types ON leaves.leavetypeid = leave_types.id
        JOIN employee ON leaves.userid = employee.phno
        WHERE leaves.status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Leaves</title>
</head>
<body>
<header><h1>Pending Leaves</h1></header>
<table id="customers">
    <tr>
        <th>Slno</th>
        <th>Employee Name</th>
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    $slno=0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $slno++;
            echo "<tr>
                    <td>".$slno."</td>
                    <td>".$row['employee_name']."</td>
                    <td>".$row['type_name']."</td>
                    <td>".$row['startdate']."</td>
                    <td>".$row['enddate']."</td>
                    <td>".$row['reason']."</td>
                    <td>".$row['status']."</td>
                    <td>
                        <form method='POST' action='updateleavestatus.php' style='display:inline;'>
                            <input type='hidden' name='leave_id' value='".$row['id']."'>
                            <input type='submit' name='approve' value='Approve'>
                            <input type='submit' name='reject' value='Reject'>
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No pending leaves found</td></tr>";
    }
    ?>
</table>
</body>
</html>

<?php
$conn->close(); // Close database connection
?>

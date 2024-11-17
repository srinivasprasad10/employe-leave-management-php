<?php
include 'uheader.php'; // Include header or any necessary files
include 'dbconfig.php'; // Include database configuration
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit();
}

// Get user ID from session
$user_id = $_SESSION['username'];

// Fetch the user's leaves from the database
$sql = "SELECT leaves.id, leaves.userid, leaves.leavetypeid, leaves.startdate, leaves.enddate, leaves.reason, leaves.status, leave_types.type_name
        FROM leaves 
        JOIN leave_types ON leaves.leavetypeid = leave_types.id
        WHERE leaves.userid = '$user_id'";
$slno=0;
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leaves</title>
</head>
<body>
<header><h1>My Leaves</h1></header>
<table id="customers">
    <tr>
        <th>ID</th>
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $slno++;
            echo "<tr>
                    <td>".$slno."</td>
                    <td>".$row['type_name']."</td>
                    <td>".$row['startdate']."</td>
                    <td>".$row['enddate']."</td>
                    <td>".$row['reason']."</td>
                    <td>".$row['status']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No leaves found</td></tr>";
    }
    ?>
</table>
</body>
</html>

<?php
$conn->close(); // Close database connection
?>

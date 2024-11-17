<?php
include 'aheader.php'; // Include header or any necessary files
include 'dbconfig.php'; // Include database configuration

// Delete functionality
if(isset($_POST['delete_leave_type'])) {
    $type_id = $_POST['type_id'];
    
    // SQL to delete leave type
    $sql_delete = "DELETE FROM leave_types WHERE id = $type_id";
    
    if($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Leave Type deleted successfully')</script>";
        echo "<meta http-equiv='refresh' content='0;viewtype.php'>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch leave types from database
$sql_select = "SELECT * FROM leave_types";
$result = $conn->query($sql_select);
$slno=0;
if ($result->num_rows > 0) {
    echo "<h1>View/Delete Leave Types</h1>";
    echo "<table id='customers' style='width:60%'>";
    echo "<tr><th>Slno</th><th>Type Name</th><th>Action</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        $type_id = $row['id'];
        $type_name = $row['type_name'];
        $slno++;
        echo "<tr>";
        echo "<td>$slno</td>";
        echo "<td>$type_name</td>";
        echo "<td>";
        echo "<form method='POST' action='viewtype.php'>";
        echo "<input type='hidden' name='type_id' value='$type_id'>";
        echo "<input type='submit' name='delete_leave_type' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No leave types found.";
}

$conn->close(); // Close database connection
?>

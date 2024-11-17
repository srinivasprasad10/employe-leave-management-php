<?php
if(isset($_POST['add_leave_type']))
{
    $type_name = $_POST['type_name'];
    
    include 'dbconfig.php'; // Include database configuration
    
    // Prepare SQL query to insert leave type
    $sql = "INSERT INTO leave_types (type_name) VALUES ('$type_name')";
    
    if($conn->query($sql) === TRUE)
    {
        echo "<script>alert('Leave Type added successfully')</script>";
        echo "<meta http-equiv='refresh' content='0;viewtype.php'>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close(); // Close database connection
}
else {
    header("Location: viewtype.php"); // Redirect to add_leave_type.php if form is not submitted
    exit();
}
?>

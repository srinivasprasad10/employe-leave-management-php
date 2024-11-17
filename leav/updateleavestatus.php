<?php
include 'dbconfig.php'; // Include database configuration
session_start();

// Check if admin is logged in
if (!isset($_SESSION['ausername'])) {
    header("Location: admin.php"); // Redirect to admin login page if not logged in
    exit();
}

// Check if form is submitted
if (isset($_POST['leave_id'])) {
    $leave_id = $_POST['leave_id'];
    $status = '';

    if (isset($_POST['approve'])) {
        $status = 'approved';
    } elseif (isset($_POST['reject'])) {
        $status = 'denied';
    }

    if ($status) {
        // Update leave status in the database
        $sql = "UPDATE leaves SET status='$status' WHERE id='$leave_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Leave status updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating leave status: ".$conn->error."');</script>";
        }
    }

    // Redirect back to pending leaves page
    echo "<meta http-equiv='refresh' content='0;url=ahome.php'>";
} else {
    header("Location: ahome.php"); // Redirect if accessed without form submission
}

$conn->close(); // Close database connection
?>

<?php
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    include 'dbconfig.php'; // Include database configuration
    
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0)
    {
        session_start(); // Start PHP session
        
        $_SESSION['ausername'] = $username;
        
        echo "<meta http-equiv='refresh' content='0;ahome.php'>";
    }
    else {
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<meta http-equiv='refresh' content='0;admin.php'>";
    }
}
else {
    header("location:admin.php");
}
?>

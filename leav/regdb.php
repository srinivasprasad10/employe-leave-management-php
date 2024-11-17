<?php

if(isset($_POST['reg']))
{
  $phno=$_POST['phno'];
  $name=$_POST['name'];
  
  $email=$_POST['email'];
  $address=$_POST['address'];
  $role=$_POST['role'];
  $password=$_POST['password'];
  $repass=$_POST['repass'];
  if($password==$repass)
  {
  include 'dbconfig.php';
  $sql="insert into employee(name,phno,email,role,address,password)value('$name','$phno','$email','$role','$address','$password');";
  if($conn->query($sql))
  {
      echo"<script>alert('Registration successful')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
  }

else{
    echo"<script>alert('please check phone number')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
        
}
  }
  
else{
    echo"<script>alert('Enter valid password')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
}
}


else{
    header("location:register.php");
}
?>
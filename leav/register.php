<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="Style.css">
    </head>
    <body>
        <h1>Register</h1>
        <form method="POST" action="regdb.php">
            <input type="text" name="name" placeholder="enter name"/><br>
            <input type="tel" name="phno" placeholder="enter phone number"/><br>
            <input type="email" name="email" placeholder="enter email"/><br>
            <input type="text" name="role" placeholder="enter your role"/><br>
            <input type="text" name="address" placeholder="enter address"/><br>
            <input type="password" name="password" placeholder="enter your password"/><br>
             <input type="password" name="repass" placeholder="re-enter your password"/><br>
            <input type="submit" name="reg" value="Register"/> <a href="index.php">Login</a>
        </form>
    </body>
</html>
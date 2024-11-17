 <?php
 include 'header.php';
 ?>
<header><h1 stytle="">Employ Login</h1>
    <form method="POST" action="login.php" class="form-group">
            <input type="text" placeholder="enter phone number" name="username" required/><br>
            <input type="password" placeholder="enter password" name="password" required/><br>
            <input type="submit" name="login" value="Login"/> <br>
            <a href="register.php">Register</a>
        </form>
</body>
</html>
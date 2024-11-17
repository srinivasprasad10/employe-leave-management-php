 <?php
 include 'header.php';
 ?>
<header><h1 stytle="">Admin login</h1>
    <form method="POST" action="alogin.php" class="form-group">
            <input type="text" placeholder="enter enter username" name="username" required/><br>
            <input type="password" placeholder="enter password" name="password" required/><br>
            <input type="submit" name="login" value="Login"/> <br>
        </form>
</body>
</html>
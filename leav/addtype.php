<?php
include 'aheader.php'; 
?>
<header><h1>Add Leave Type</h1></header>
<form method="POST" action="addtypedb.php" class="form-group">
    <label for="type_name">Leave Type Name:</label>
    <input type="text" id="type_name" name="type_name" required/><br>
    <input type="submit" name="add_leave_type" value="Add Leave Type"/> <br>
</form>
</body>
</html>

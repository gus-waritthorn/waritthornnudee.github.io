<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST['submit'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dreamhome";
	$customernoval = $_POST['customerno'];
	$fnameval = $_POST['firstname'];
	$lnameval = $_POST['lastname'];
	$telnoval = $_POST['telnumber'];
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO client (clientno, fname, lname, telno)
		VALUES ('$customernoval', '$fnameval', '$lnameval', '$telnoval')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
	
	$conn = null;
}
?>
<form method="post">
CustomerNo <input type="text" name="customerno" /><br><br>
FirstName <input type="text" name="firstname" /><br><br>
LastName <input type="text" name="lastname" /><br><br>
TelNo <input type="text" name="telnumber" /><br><br>
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
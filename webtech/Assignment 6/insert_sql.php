<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST['submit'])){
	$servername = "localhost";
	$username = "noo";
	$password = "mypass";
	$dbname = "webtech";
	$customerval = $_POST['customerid'];
	$idval = $_POST['id'];
	$firstval = $_POST['firstname'];
	$lastval = $_POST['lastname'];
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO customerid (CustomerID, CitizenID, Firstname, Lastname)
		VALUES ('$customerval', '$idval', '$firstval', '$lastval')";
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
CustomerID <input type="text" name="customerid" /><br><br>
CitenzenID <input type="text" name="id" /><br><br>
FistName <input type="text" name="firstname" /><br><br>
LastName <input type="text" name="lastname" /><br><br>
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
<?php
include 'dbcon.php';
session_start();
echo $_SESSION['vercode'];
if(isset($_POST['submit'])){ 

	if($_SESSION['vercode']!=$_POST['var'] OR $_POST['var']==''){
		?>
		<script type="text/javascript">
			alert('incorrect Varification Code');
		</script>
		<?php
	}
	else{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$sql="INSERT INTO users(name,email) VALUES(?,?)";
		$stmt=$con->prepare($sql);
		$stmt->bind_param("ss",$name,$email);
		$stmt->execute();
		$stmt->close();
		?>
		<script type="text/javascript">
			alert("data submitted");
		</script>
		<?php
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Capthc
	</title>
</head>
<body>
<table>
	<form action="" method="post">
		<tr>
			<th>Varification Code</th>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Verificatio Code:</td>
			<td><input type="text" name="var" required=" " size="10">&nbsp;<img src="captcha.php" style="margin-top: 1%;"></td>
		</tr>
		<tr>
			<td>
		<input type="submit" name="submit" value="Submit"></td></tr>
	</form>
</table>
</body>
</html>
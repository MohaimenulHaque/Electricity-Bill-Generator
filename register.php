<?php
// include('server.php') 

?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="icon" href="desco.png" type="image">
</head>


<body>

	<div class="header">
		<img src="desco2.png" alt="Logo" class="logo">
		<h2>Register</h2>
	</div>

	<form method="post" action="">

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="username" value="" required>
		</div>

		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" required>
		</div>

		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" required>
		</div>

		<div class="input-group">
			<label>Meter No.</label>
			<input type="text" name="meter_no" value="" required>
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group" id="btn">
			<button type="submit" class="btn" name="reg_user">Register</button>
			<a href="admin_page.php">
				<div class="btn1">
					<p>Back</p>
				</div>
			</a>
		</div>
		<p>
			<!-- Already a member? <a href="#">Log in</a> -->

			<?php
				include('connectPHP.php');

				if (isset($_POST['reg_user'])) { 
					$userName = $_POST['username'];
					$userAddress = $_POST['address'];
					$userPhone = $_POST['phone'];
					$meter = $_POST['meter_no'];
					$userPass = $_POST['password'];

					$md5pass = md5($userPass);

					$checkUser1 = "SELECT * FROM customer WHERE meter_no=$meter";
					$result1 = mysqli_query($conn, $checkUser1);
					$count1 = mysqli_num_rows($result1);

					if ($count1 > 0) {
						echo 'This meter has already registered. Try uniqe meter No.';
					} else {
						$sql = "INSERT INTO customer(name,address,phone,cpassword,meter_no) VALUES('$userName','$userAddress','$userPhone','$md5pass','$meter')";
						$query_run = mysqli_query($conn, $sql);
			?>
					<script>
						alert('Registration Successfull');
					</script>
			<?php
					}
				}

			?>
		</p>
	</form>

	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>

</body>

</html>
<?php
// include('server.php') 
?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="adminlogin.css">
	<script src="script.js"></script>
</head>

<body>
	<div class="header">
		<img src="desco2.png" alt="Logo" class="logo">
		<h2>Customer Login</h2>
	</div>

	<form method="post" action="">

		<?php
		// include('errors.php'); 
		?>
		<div class="input-group">
			<label>Meter number</label>
			<input type="text" name="meternumber" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			<!-- Not yet a member? <a href="register.html">Register your account</a> -->
			<?php

			session_start();

			include('connectPHP.php');

			if (isset($_POST['login_user'])) {
				$meterNo = $_POST['meternumber'];
				$pass = $_POST['password'];

				$md5pass = md5($pass);

				$_SESSION['meternumber'] = $meterNo;

				if (!empty($meterNo) && !empty($pass)) {
					$login_sql = "SELECT * FROM customer WHERE meter_no='$meterNo' AND cpassword='$md5pass' ";
					$sql_query = mysqli_query($conn, $login_sql);
					$mysqli_num_rows = mysqli_num_rows($sql_query);

					if ($mysqli_num_rows) {
						?>
							<script>
								alert('Login Successfully');
								userPage();
							</script>
						<?php
					} else {
						echo 'Invalid Meter Number or Password';
					}
				} else {
					echo 'Fillup the box';
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
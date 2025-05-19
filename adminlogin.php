<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="adminlogin.css">
	<script src="script.js"></script>
</head>

<body>
	<div class="bgimg"></div>

	<div class="header">
		<img src="desco2.png" alt="Logo" class="logo">
		<h2>Admin Login</h2>
	</div>

	<form method="post" action="">
		<?php
		// include('errors.php'); 
		// session_start();
		?>
		<div class="input-group">
			<label>Admin Id</label>
			<input type="text" name="adminid" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_admin">Login</button>
		</div>
		<!-- <p>Not yet a member? <a href="register.html">Register your account</a></p> -->

		<p>
			<?php
			include('connectPHP.php');
			if (isset($_POST['login_admin'])) {
				$adminName = $_POST['adminid'];
				$adminPass = $_POST['password'];

				if (!empty($adminName) && !empty($adminPass)) {
					$sql = "SELECT * FROM admin WHERE username = '$adminName' AND apassword ='$adminPass'";
					$sql_query = mysqli_query($conn, $sql);
					$mysqli_num_rows = mysqli_num_rows($sql_query);

					if ($mysqli_num_rows) {
						?>
							<script>
								alert('Login Successfully');
								adminPage();
							</script>
						<?php
					} else {
						echo 'Invalid Admin Id or Password';
					}
				} else {
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
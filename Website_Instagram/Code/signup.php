<?php
	require 'functions.php';
	session_start();

	if(isset($_SESSION["login"])){
		header("Location: home.php");
		exit;
	}
	
	if(isset($_POST["submit"])){
		if($_POST["password"] == $_POST["confirmPassword"]){
			$email = $_POST["email"];
			$daftar = signUp($_POST);
			$account = claimData("SELECT * FROM account WHERE email='$email';")[0];
			$_SESSION["login"] = true;
			$_SESSION["id"] = $account["id"];
			$_SESSION["email"] = $account["email"];
			$_SESSION["name"] = $account["name"];
			$_SESSION["username"] = $account["username"];
			$_SESSION["number"] = $account["number"];
			$_SESSION["password"] = $account["password"];
			$_SESSION["firstBackground"] = $account["firstBackground"];
			$_SESSION["secondBackground"] = $account["secondBackground"];
			
			if($account >= 1 ){
				echo "<script>
				alert('Berhasil mendaftar akun');
				document.location.href = 'home.php';
				</script>";
			}

		}else{
			echo "<script>
			alert('Pastikan memasukan password yang sama');
			</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">
</head>
<body>
	<style>
		:root{
			--main-color: #B1FEC6;
			--second-color: #2AF29D;
			--third-color: #A0A0A0;
			--fourth-color: #25B7DB;
		}
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Raleway', sans-serif;
			outline: none;
		}
		body{
			background-color: var(--main-color);
			width: 100%;
			height: 100vh;
			overflow: hidden;
		}
		.login-form{
			width: 518px;
			background-color: #fff;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			border-radius: 20px;
			padding: 30px 60px;
		}
		.brand-logo h2{
			font-size: 50px;
			color: var(--second-color);
			text-align: center;
			margin-bottom: 30px;
		}
		.form-group{
			margin-bottom: 30px;
		}
		.form-group:nth-child(4){
			margin: 0;
		}
		.form-control{
			width: 400px;
			height: 28px;
			border: none;
			border-bottom: 2px solid var(--third-color);
			color: var(--third-color);
		}
		button[type="submit"]{
			text-align: center;
			font-size: 30px;
			color: white;
			width: 400px;
			height: 60px;
			background-color: var(--second-color);
			border: none;
			border-radius: 50px;
		}
		.forgot{
			font-size: 16px;
			color: var(--fourth-color);
			margin-top: 15px;
			display: block;
			text-decoration: none;
		}
		.signup{
			color: #A0A0A0;
			font-size: 16px;
			text-align: center;
			margin-top: 30px;
		}
		.signup a{
			color: var(--fourth-color);
			text-decoration: none;
			outline: none;
		}
		.agreement{
			color: var(--third-color);
			text-align: center;
			margin: 19px 0;
		}
		.agreement a{
			text-decoration: none;
			color: var(--fourth-color);
		}
		.circle li{
			width: 400px;
			height: 400px;
			background-color: var(--second-color);
			border-radius: 50%;
			list-style: none;
			position: absolute;
		}
		.circle li:nth-child(1){
			top: -200px;
			left: -200px;
		}
		.circle li:nth-child(2){
			bottom: -200px;
			right: -200px;
		}
	</style>
</body>
	<ul class="circle">
		<li></li>
		<li></li>
	</ul>

	<div class="login-form">
		<div class="content">
			<div class="brand-logo">
				<h2>Instagram</h2>
			</div>

			<form action="" method="post">
				<div class="form-group">
					<input class="form-control" type="text" autocomplete="off" placeholder="Username" name="username" required>
				</div>

				<div class="form-group">
					<input class="form-control" type="email" autocomplete="off" placeholder="Email Address" name="email" required>
				</div>

				<div class="form-group">
					<input class="form-control" type="password" autocomplete="off" placeholder="Password" name="password" required>
				</div>

				<div class="form-group">
					<input class="form-control" type="password" autocomplete="off" placeholder="Confirm Password" name="confirmPassword" required>
				</div>

				<p class="agreement">By signing up, you accept the <a href="">terms of use</a> and <a href="">privacy policy</a></p>

				<button type="submit" name="submit">Sign Up</button>
			</form>

			<p class="signup">Already have an account ? <a href="signin.php">Sign In</a></p>
		</div>
	</div>
</html>
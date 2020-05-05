<?php
	session_start();

	if(!isset($_SESSION["login"])){
		header("Location: signin.php");
		exit;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ddf5586ee7.js" crossorigin="anonymous"></script>
</head>
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
			background-color: <?= $_SESSION["firstBackground"] ?>;
			width: 100%;
			height: 100vh;
		}
		.container{
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: space-between;
		}
		.left-sidebar{
			width: 80px;
			height: 100%;
			position: fixed;
			left: 0;
			top: 0;
			background-color: white;
			display: flex;
			justify-content: space-between;
			flex-direction: column;
		}
		.right-sidebar{
			width: calc(100% - 80px);
			height: 100%;
			margin-left: 80px;
		}
		.icon-list{
			padding: 15px;
			display: flex;
			justify-content: space-between;
			flex-direction: column;
		}
		.icon{
			width: 50px;
			height: 50px;
			background-color: <?= $_SESSION["secondBackground"] ?>;
			border-radius: 50%;
			font-size: 25px;
			color: white;
			margin-bottom: 15px;
			display: flex;
			justify-content: center;
			align-items: center;
			text-decoration: none;
		}
		.last-icon{
			margin: 0;
		}
	</style>
<body>
	<div class="container">
		<div class="left-sidebar">
			<div class="icon-list">
				<a href="home.php" class="icon">
					<i class="fas fa-home"></i>
				</a>

				<a href="discover.php" class="icon">
					<i class="fas fa-compass"></i>
				</a>

				<a href="chat.php" class="icon">
					<i class="fas fa-comment-alt"></i>
				</a>

				<a href="themes.php" class="icon last-icon">
					<i class="fas fa-store-alt"></i>
				</a>
			</div>

			<div class="icon-list">
				<a href="profile.php" class="icon last-icon">
					<i class="fas fa-cog"></i>
				</a>
			</div>
		</div>

		<div class="right-sidebar">

		</div>
	</div>
</body>
</html>
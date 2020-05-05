<?php
    require 'functions.php';
    session_start();
    
    if(!isset($_SESSION["login"])){
        header("Location: signin.php");
        exit;
    }

    if(isset($_POST["submit"])){
        $account = changeProfile($_POST);

        $_SESSION["name"] = $_POST["name"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["number"] = $_POST["number"];

        echo "<script>
        alert('Berhasil mengubah data');
        </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
			background-color: var(--main-color);
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
			height: 100vh;
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
        .title-page{
            width: 100%;
            height: 80px;
            background-color: <?= $_SESSION["secondBackground"] ?>;
            color: white;
            padding: 24px 36px;
        }
        .splitter{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: space-between;
        }
        .information-bar{
            width: 380px;
            height: 100vh;
            background-color: #EEEEEE;
            padding: 30px 40px;
        }
        .item-bar{
            width: calc(100% - 380px);
            background-color: #fff;
            padding: 34px 60px;
            height: 100vh;
        }
        .search{
            width: 300px;
            height: 40px;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
        }
        .categories{
            margin-top: 26px;
        }
        .categories li{
            list-style: none;
            border-bottom: 2px solid #878787;
            padding: 5px 0;
        }
        .categories li:nth-child(1) a{
            color: #000;
        }
        .categories li:nth-child(1){
            border-bottom: 2px solid #000;
        }
        .categories li:nth-child(1), .categories li:nth-child(2){
            margin-bottom: 26px;
        }
        .categories li:nth-child(3){
            border-bottom: 3px solid #FF0000;
        }
        .categories li:nth-child(3) a{
            color: #FF0000;
        }
        .categories a{
            text-decoration: none;
            color: #878787;
        }
        .item-bar h2{
            margin-bottom: 34px;
        }
        label{
            font-size: 18px;
            color: #A0A0A0;
        }
        .item-bar input{
            width: 300px;
            height: 40px;
            border: none;
            background-color: #EEEEEE;
            border-radius: 5px;
            padding: 5px 15px;
        }
        .form-group{
            margin-bottom: 26px;
        }
        .control1{
            margin-left: 99px;
        }
        .control2{
            margin-left: 62px;
        }
        .control3{
            margin-left: 30px;
        }
        .control4{
            margin-left: 80px;
        }
        button[type="submit"]{
            color: #fff;
            font-size: 18px;
            width: 151px;
            height: 40px;
            background-color: <?= $_SESSION["secondBackground"] ?>;
            border: none;
            border-radius: 5px;
            text-align: center;
            display: block;
            margin-left: 300px;
            cursor: pointer;
            outline: none;
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
            <div class="title-page">
                <h2>Option</h2>
            </div>

            <div class="splitter">
                <div class="information-bar">
                    <input type="text" placeholder="Search Items" class="search">

                    <ul class="categories">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="privacy.php">Privacy</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>

                <div class="item-bar">
                    <h2>Profile</h2>

                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name='id' value='<?= $_SESSION["id"] ?>'>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control control1" name="name" autocomplete="off" value="<?= $_SESSION["name"] ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control control2" name="username" autocomplete="off" value="<?= $_SESSION["username"] ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control control3" name="email" autocomplete="off" value="<?= $_SESSION["email"] ?>">
                        </div>

                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="tel" class="form-control control4" name="number" autocomplete="off" value="<?= $_SESSION["number"] ?>">
                        </div>

                        <button type="submit" name="submit">Save Changes</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</body>
</html>
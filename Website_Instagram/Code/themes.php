<?php
    require 'functions.php';
    session_start();
    
    if( !isset($_SESSION["login"])){
        header("Location: signin.php");
        exit;
    }
    if( isset($_POST["button1"])){
        $_SESSION["secondBackground"] = "#88AEEE";
    }
    if( isset($_POST["button2"])){
        $_SESSION["secondBackground"] = "#A53AF6";
    }
    if( isset($_POST["button3"])){
        $_SESSION["secondBackground"] = "#F77474";
    }
    if( isset($_POST["button4"])){
        $_SESSION["secondBackground"] = "#FE7BB8";
    }
    if( isset($_POST["button5"])){
        $_SESSION["secondBackground"] = "#FFAC75";
    }
    if( isset($_POST["button6"])){
        $_SESSION["secondBackground"] = "#3DDBD1";
    }
    $account = changeBackground($_SESSION["secondBackground"]);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
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
            overflow: hidden;
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
        .title-page{
            width: 100%;
            height: 80px;
            background-color: <?= $_SESSION["secondBackground"] ?>;
            color: white;
            padding: 24px 36px;
        }
        .splitter{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
        }
        .information-bar{
            width: 380px;
            height: 100%;
            background-color: #EEEEEE;
            padding: 30px 40px;
        }
        .item-bar{
            width: calc(100% - 380px);
            background-color: #fff;
            padding: 34px 60px;
            height: 498px;
            overflow-y: scroll;
        }
        input[type="text"]{
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
            color: #878787;
            padding: 5px 0;
        }
        .categories li:nth-child(1){
            margin-bottom: 26px;
            border-bottom: 2px solid #000;
        }
        .categories li:nth-child(1) a{
            color: #000;
        }
        .categories a{
            text-decoration: none;
            color: #878787;
        }
        .item-list{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .item-list1{
            margin: 26px 0;
        }
        .item-list2{
            margin-top: 26px;
        }
        .item{
            width: 200px;
            position: relative;
        }
        .background{
            width: 200px;
            height: 150px;
            background-color: red;
        }
        .context{
            color: var(--third-color);
        }
        .context h4{
            font-size: 18px;
            margin: 12px 0 3px 0;
        }
        .context p{
            font-size: 15px;
        }
        .background1{
            background-color: #88AEEE;
        }
        .background2{
            background-color: #A53AF6;
        }
        .background3{
            background-color: #F77474;
        }
        .background4{
            background-color: #FE7BB8;
        }
        .background5{
            background-color: #FFAC75;
        }
        .background6{
            background-color: #3DDBD1;
        }
        button{
            color: white;
            width: 60px;
            height: 30px;
            background-color: <?= $_SESSION["secondBackground"] ?>;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form{
            position: absolute;
            bottom: 0;
            right: 0;
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

				<a href="store.php" class="icon last-icon">
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
                <h2>Instagram Store</h2>
            </div>

            <div class="splitter">
                <div class="information-bar">
                    <input type="text" placeholder="Search Items">

                    <ul class="categories">
                        <li><a href="themes.php">Themes</a></li>
                        <li><a href="stickers.php">Stickers</a></li>
                    </ul>
                </div>

                <div class="item-bar">
                    <h2 class="text">Recommended For You</h2>

                    <div class="item-list item-list1">
                        <div class="item">
                            <div class="background background1"></div>

                            <div class="context">
                                <h4>Blue</h4>
                                <p>3.9 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button1">Use</button>
                                </form>
                            </div>
                        </div>

                        <div class="item">
                            <div class="background background2"></div>

                            <div class="context">
                                <h4>Purple</h4>
                                <p>3.7 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button2">Use</button>
                                </form>
                            </div>
                        </div>
            
                        <div class="item">
                            <div class="background background3"></div>

                            <div class="context">
                                <h4>Red</h4>
                                <p>4.0 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button3">Use</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <h2 class="text">Made By Users</h2>

                    <div class="item-list item-list2">
                        <div class="item">
                            <div class="background background4"></div>

                            <div class="context">
                                <h4>Pink</h4>
                                <p>3.3 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button4">Use</button>
                                </form>
                            </div>
                        </div>

                        <div class="item">
                            <div class="background background5"></div>

                            <div class="context">
                                <h4>Orange</h4>
                                <p>4.2 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button5">Use</button>
                                </form>
                            </div>
                        </div>
            
                        <div class="item">
                            <div class="background background6"></div>

                            <div class="context">
                                <h4>Aqua</h4>
                                <p>3.6 <i class="fas fa-star"></i></p>

                                <form action="" method="post">
                                    <button type="submit" name="button6">Use</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</body>
</html>
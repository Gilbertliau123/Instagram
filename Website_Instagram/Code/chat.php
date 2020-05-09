<?php
	session_start();

	if(!isset($_SESSION["login"])){
		header("Location: signin.php");
		exit;
	}
    $friend_img = ["people_1", "people_2", "people_3", "people_4"];
    $friend_name = ["Yoan Welton", "Jane Gold", "Alex Mean"];
    $friend_history = ["I'm geting tired of this", "I would like to sleep", "Help me to finish this"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chats</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ddf5586ee7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
	<style>
		:root{
			--main-color: #B1FEC6;
			--second-color: #2AF29D;
			--third-color: #A0A0A0;
			--fourth-color: #25B7DB;
            --text-light-color: #818181;
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
        .title-page{
            width: 100%;
            height: 80px;
            background-color: <?= $_SESSION["secondBackground"] ?>;
            color: white;
            padding: 24px 36px;
        }
        .splitter{
            width: 100%;
            height: calc(100vh - 80px);
            display: flex;
            justify-content: space-between;
        }
        .list-friend-bar input[type="text"]{
            width: 300px;
            height: 40px;
            border: none;
            border-radius: 10px;
            margin: 0 40px;
            padding: 10px 15px;
        }
        .list-friend-bar{
            width: 380px;
            height: 100%;
            background-color: #EEEEEE;
            padding: 30px 0;
        }
        .list-friend{
            list-style: none;
            margin-top: 30px;
            width: 100%;
        }
        .friend{
            width: 380px;
            height: 100px;
            padding: 25px 40px;
            display: flex;
            justify-content: flex-start;
        }
        .friend:nth-child(1){
            background-color: <?= $_SESSION["secondBackground"] ?>;
        }
        .friend img{
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }
        .friend .information{
            margin-left: 25px;
        }
        .friend .information .p{
            font-weight: light;
            color: var(--text-light-color);
            display: block;
        }
        .chat-bar{
            width: calc(100% - 380px);
            background-color: #fff;
            height: calc(100vh - 80px);
        }
        .recent-friend{
            width: 100%;
            height: 100px;
            border-bottom: 1px solid var(--text-light-color);
            padding: 25px 40px;
        }
        .recent-info{
            display: flex;
            justify-content: flex-start;
        }
        .recent-info img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 14px;
        }
        .communication{
            width: 100%;
            height: calc(100vh - 80px - 80px - 58px - 24px);
            padding: 0 16px;
        }
        .communication p{
            display: none;
            padding: 10px 30px;
            border-bottom-right-radius: 15px;
            color: black;
            margin-top: 20px;
            margin-left: auto;
            background-color: <?= $_SESSION["secondBackground"] ?>;
        }
        .textbox-type input{
            width: 100%;
            height: 61px;
            border: none;
            padding: 0 16px;
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
                <h2>Chats</h2>
            </div>

            <div class="splitter">
                <div class="list-friend-bar">
                    <input type="text" placeholder="Search Friends">

                    <ul class="list-friend">
                        <?php for($i = 0; $i < 3; $i++) : ?>
                        <li class="friend">
                            <img src="img/<?= $friend_img[$i]?>.jpg">

                            <div class="information">
                                <h3><?= $friend_name[$i]?></h3>
                                <p><?= $friend_history[$i]?></p>
                            </div>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>

                <div class="chat-bar">
                    <div class="recent-friend">
                        <div class="recent-info">
                            <img src="img/people_1.jpg">

                            <div class="recent-description">
                                <h3>Yoan Welton</h3>
                                <p>Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="communication">
                        <p>Selamat Datang</p>
                    </div>
                    <div class="textbox-type">
                        <input type="text" placeholder="Please enter a message">
                    </div>
                </div>
            </div>
		</div>
    </div>

    <script>
       var date = new Date();  

       var bulan = {
           0:"January",1:"February",2:"March",3:"April",4:"May",5:"June",
           6:"July",7:"August",8:"September",9:"Oktober",10:"November",11:"Desember"
       }
       var hari = {
          0:"Sunday",1:"Monday",2:"Tuesday",3:"Wednesday",4:"Thursday",5:"Friday",6:"Saturday"
       }

       var translate = {
           "hello":"Hey",
           "hey":"Hello",
           "halo":"Hai",
           "helo":"Hei",
           "hai":"Halo",
           "hei":"Halo",
           "good_morning":"Good Morning too",
           "good_afternoon":"Good afternoon too",
           "good_evening":"Good evening too",
           "good_night":"Good night too",
           "how_are_you_?":"I'm fine. How about you?",
           "how_are_you":"I'm fine. How about you?",
           "introduce":"I'm robot in this website, hopeful we can be a good friend",
           "year":`${date.getFullYear()}`,
           "month":`${bulan[date.getMonth()]}`,
           "day":`${hari[date.getDay()]}`,
           "today":`${hari[date.getDay()]}`
       }

       var input = document.querySelector(".textbox-type input");
       var i = 0;

       $(document).ready(function(){
           $(input).keypress(function(e){
               input = document.querySelector(".textbox-type input");
               if(e.which == 13){   
                    date = new Date();              
                    var elementDiv = document.createElement("div");
                    var elementParagraf = document.createElement("p");
                    var communication_box = document.querySelector(".communication");
                    var node = document.createTextNode(input.value);
                    elementParagraf.appendChild(node);
                    elementDiv.appendChild(elementParagraf);
                    elementDiv.className = "element-div";
                    communication_box.appendChild(elementDiv);
                    var jumlah = document.querySelectorAll(".element-div");
                    jumlah[i].classList.add("type");
                    i += 1;
                    var nilai = document.querySelector(".textbox-type input").value;
                    input.value = "";

                   setTimeout(function(){
                        if(i != 0){
                            var kalimat = nilai.toString().toLowerCase().replace(/ /g, "_");
                            // console.log(kalimat);
                            if(translate[kalimat] != undefined){
                                var node = document.createTextNode(translate[kalimat]);
                            }else{
                                var node = document.createTextNode("Sorry, i dont understand");
                            }
                            var elementDiv = document.createElement("div");
                            var elementParagraf = document.createElement("p");
                            var communication_box = document.querySelector(".communication");
                            elementParagraf.appendChild(node);
                            elementDiv.appendChild(elementParagraf);
                            elementDiv.className = "element-div";
                            communication_box.appendChild(elementDiv);
                            var jumlah = document.querySelectorAll(".element-div");
                            jumlah[i].classList.add("answer");
                            i += 1;
                            input.value = "";
                    }
                   }, 1000);
               }
           })
       }) 
    </script>

</body>
</html>
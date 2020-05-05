<?php 
$conn = mysqli_connect("localhost", "root", "", "instagram");

function login($data){
	global $conn;

	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);

	$result = mysqli_query($conn, "SELECT * FROM account WHERE email='$email' AND password='$password';");

	return mysqli_num_rows($result);
}

function takeData($take){
	global $conn;

	$result = mysqli_query($conn, $take);
	$row = mysqli_fetch_array($result);

	return $row;
}

function claimData($claim){
	global $conn;
	$query = $claim;

	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_array($result)){
		$rows[] = $row;
	}
	error_reporting(0);
	return $rows;
}

function signUp($signUp){
	global $conn;

	$username = htmlspecialchars($signUp["username"]);
	$email = htmlspecialchars($signUp["email"]);
	$password = htmlspecialchars($signUp["password"]);
	$firstBackground = '#B1FEC6';
	$secondBackground = '#2FED99';

	mysqli_query($conn, "INSERT INTO account(username, email, password, firstBackground, secondBackground)VALUES('$username', '$email', '$password', '$firstBackground', '$secondBackground');");

	return mysqli_affected_rows($conn);
}

function changeProfile($changeProfile){
	global $conn;

	$id = $changeProfile["id"];
	$name = $changeProfile["name"];
	$username = $changeProfile["username"];
	$email = $changeProfile["email"];
	$number = $changeProfile["number"];

	mysqli_query($conn, "UPDATE account set name='$name', username='$username', email='$email', number='$number' WHERE id='$id';");
}

function changePrivacy($changePrivacy){
	global $conn;

	$id = $changePrivacy["id"];
	$newpassword = $changePrivacy["newpassword"];

	mysqli_query($conn, "UPDATE account SET password='$newpassword' WHERE id='$id';");

	return mysqli_error($conn);
}

function changeBackground($changeBackground){
	global $conn;

	$id = $_SESSION["id"];
	$query = "UPDATE account SET secondBackground='$changeBackground' WHERE id='$id';";
	mysqli_query($conn, $query);
}

?>
<?php
session_start();

//username and password entered in form on loginpage.html
$entered_user = $_POST['user'];
$entered_pass = $_POST['pass'];

$mysqli = new mysqli(
			"fall-2020.cs.utexas.edu", 
			"cs329e_bulko_ivanday", 
			"Pizza3Crude-Mine", 
			"cs329e_bulko_ivanday");

$command = "SELECT * FROM MusicMachineAccounts WHERE username = '".$entered_user."'";
$result = $mysqli->query($command);
if(mysqli_num_rows($result) == 0){
	header("Refresh: 0; URL=loginpage.html");
	echo "<script>alert('Username does not exist');</script>";
}
else{
	$row = $result->fetch_row();
	if($row[2] == $entered_pass){
		$_SESSION['username'] = $entered_user;
		setcookie('remember_this_user',$entered_user);
		header("Refresh:0; url=profile.php");
	}
	else{
		header("Refresh: 0; URL=loginpage.html");
		echo "<script>alert('Incorrect password');</script>";
	}
}

//txt file containing usernames and passwords
/*
$users_file = fopen("users.txt",'r');

//create arrays of existing usernames and passwords from users.txt
$existing_users = array();
$existing_pass = array();
while (!feof($users_file)) {
	$current = fgets($users_file);
	$current_split = explode(':',$current);
	$current_user = $current_split[0];
	$current_pass = $current_split[1];
	array_push($existing_users, $current_user);
	array_push($existing_pass, $current_pass);
}
fclose($users_file);

//check if entered username is in existing users
if (in_array($entered_user,$existing_users)) {
	//entered username is an existing username

	//check if entered password matches existing password for that username
	$index = array_search($entered_user,$existing_users);
	if ($entered_pass == $existing_pass[$index]) {
		//password is correct, login successful
		
		//create session variable for username
		$_SESSION['username'] = $entered_user;

		//if remember me is selected, create a cookie that will remember the username and automatically log that user in next time
		setcookie('remember_this_user',$entered_user);

		//redirect to profile page
		header("Refresh:0; url=profile.php");
	}
	else {
		//password is incorrect
		header("Refresh:0; url=loginpage.html");
		echo("<script>alert('Password incorrect')</script>");
	}
}
else {
	//entered username is not an existing username

	header("Refresh:0; url=loginpage.html");
	echo("<script>alert('Username does not exist')</script>");
}*/


?>

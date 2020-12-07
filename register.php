<?php
session_start();

//username, password, name entered by user
$entered_user = $_POST['user'];
$entered_pass = $_POST['pass'];
$entered_name = $_POST['name'];

//array of favorite music genres entered by user
$entered_genres = array();
if (isset($_POST['rock'])) {
	array_push($entered_genres,'Rock');
}
if (isset($_POST['rap'])) {
	array_push($entered_genres,'Rap');
}
if (isset($_POST['country'])) {
	array_push($entered_genres,'Country');
}
if (isset($_POST['classical'])) {
	array_push($entered_genres,'Classical');
}
if (isset($_POST['edm'])) {
	array_push($entered_genres,'EDM');
}
if (isset($_POST['pop'])) {
	array_push($entered_genres,'Pop');
}
//make string from values in array, each value separated by comma
$genres_str = implode(',',$entered_genres);

//txt file containing usernames and passwords
$users_file = fopen("users.txt",'r');

//create arrays of existing usernames and passwords from users.txt
$existing_users = array();
$existing_pass = array();
while (!feof($users_file)) {
	$current = fgets($users_file);
	$current_split = explode(':',$current);
	$current_user = $current_split[0];
	$current_pass = substr($current_split[1],0,-1);
	array_push($existing_users, $current_user);
	array_push($existing_pass, $current_pass);
}
fclose($users_file);

//check if username already exists
if (in_array($entered_user,$existing_users)) {
	//username already exists
	header("Refresh:0; url=registerpage.html");
	echo("<script>alert('Username already exists')</script>");
}
else {
	//username doesn't already exist, registration successful

	//add new user to users file
	$users_file = fopen('users.txt','a');
	fwrite($users_file,$entered_user.':'.$entered_pass.':'.$entered_name.':'.$genres_str."\n");
	fclose($users_file);

	$_SESSION['username'] = $entered_user;

	header("Refresh:0; url=profile.php");
}


?>

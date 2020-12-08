<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<div id="container">
		<div id="top">
			<a href="index.html">
			<img src="logo.png" alt="Music Machine Logo" class="logo">
			</a>
			<ul class="navbar">
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="discover.php">Discover</a></li>
				<li><a href="recommendations.php">Recommendations</a></li>
				<li><a class="current">Profile</a></li>
				<li><a href="contact_us.html">Contact Us</a></li>
			</ul>
		</div>	
		<div id="content" style="margin-right:0px;">
			<?php 
				session_start();

				//check if 'remember me' cookie is set
				if (isset($_COOKIE['remember_this_user'])) {
					//remember cookie is set, set session variable to that username
					$_SESSION['username'] = $_COOKIE['remember_this_user'];
				}

				if (!isset($_SESSION['username'])) {
					header("Refresh:0; url=loginpage.html");
				}
				else {
					//display profile info
					
					echo('<h1>Your Profile</h1>');

					$username = $_SESSION['username'];
					//read from file to get info about this user
					/*
					$file = fopen('users.txt','r');
					while(!feof($file)){
						$currentline = fgets($file);
						$current_split = explode(':',$currentline);
						$current_user = $current_split[0];
						
						if ($current_user == $username) {
							$password = $current_split[1];
							$name = $current_split[2];
							$genres = substr($current_split[3],0,-1);
									
							break;
						}
					}
					fclose($file);
					*/
					$mysqli = new mysqli(
						"fall-2020.cs.utexas.edu", 
						"cs329e_bulko_ivanday", 
						"Pizza3Crude-Mine", 
						"cs329e_bulko_ivanday");

					$command = "SELECT * FROM MusicMachineAccounts WHERE username = '".$username."'";
					$result = $mysqli->query($command);
					$row = $result->fetch_row();
					$name = $row[0];
					$password = $row[2];
					$genres = $row[3];
					$_SESSION['genres'] = $genres;

					echo('
						<table>
							<tr>
								<td><b>Name:</b></td>
								<td>'.$name.'</td>
							</tr>
							<tr>
								<td><b>Username:</b></td>
								<td>'.$username.'</td>
							</tr>
							<tr>
								<td><b>Password:</b></td>
								<td>'.$password.'</td>
							</tr>
							<tr>
								<td><b>Favorite Music Genres:     </b></td>
								<td>'.$genres.'</td>
							</tr>
						</table>
					');

					echo('<br>');
					echo('<a href="logout.php">Logout</a>');
					
				}
			?>
		</div>
	</div>
</html>

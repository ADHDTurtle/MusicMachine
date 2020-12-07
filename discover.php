<html>
	<head>
		<title>Discover</title>
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
				<li><a class="current">Discover</a></li>
				<li><a href="recommendations.php">Recommendations</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="contact_us.html">Contact Us</a></li>
			</ul>
		</div>	
		<div id="content" style="margin-right:0px;">
			<h1>Discover</h1>
			
			<div style="text-align:center;">
			<h2>Top 100 Songs with Video</h2>
			<iframe width='560px' height='315px' style='border:none' src='https://www.youtube.com/embed/videoseries?list=PLDIoUOhQQPlXr63I_vwF9GD8sAKh77dWU'></iframe>
			<p style='font-size:12;'>Playlist: <i>TOP 100 Songs of 2020 - Billboard Hot 100 - Music Playlist 2020</i> by Chillax</p>
			<hr>
			<h2>Top By Genre</h2>
			<table style='margin-left:auto; margin-right:auto; text-align:center; font-size:24;'>					
				<tr>
					<td style='width:450px;'>
						<b>Rock</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/rock-and-metal-singles-chart/'></iframe>
					</td>
					<td style='width:450px;'>
						<b>Hip-Hip/Rap/R&B</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/official-hip-hop-and-r-and-b-singles-chart/'></iframe>
					</td>
					<td style='width:450px;'>
						<b>Country</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/country-artists-albums-chart/'></iframe>
					</td>
				</tr>
				<tr>
					<td style='width: 450px;'>
						<b>Electronic/Dance</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/dance-singles-chart/'></iframe>
					</td>
					<td style='width:450px;'>
						<b>Classical</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/classical-singles-chart/'></iframe>
					</td>
					<td style='width:450px;'>
						<b>Pop</b><br>
						<iframe width='350px' height='500px' src='https://www.officialcharts.com/charts/singles-chart/'></iframe>
					</td>
				</tr>
			</table>
			<p style='font-size:12;'>Charts referenced from <a href='https://www.officialcharts.com/charts/'>www.officialcharts.com</a></p>
			<hr>
			<h2>Music For You</h2>
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					echo('<p>Based on your favorite genres of music, we picked this song for you to check out</p>');
					
					//pick a random genre from user's favorite genres, show a popular song from that
					$genres = $_SESSION['genres'];	
					$genres_array = explode(',',$genres);
					$num = sizeof($genres_array);
					$random_index = rand(0,$num-1);
					$random_genre = $genres_array[$random_index];
					
					if ($random_genre == "Pop") {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/pok8H_KF1FA"></iframe><br><p><i>Say So</i> by Doja Cat</p>');
					}
					elseif ($random_genre == "Rock") {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/xbhCPt6PZIU"></iframe><br><p><i>Stairway to Heaven</i> by Led Zeppelin</p>');
					}
					elseif ($random_genre == "Rap") {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/leJNDpm_G10"></iframe><br><p><i>Hot</i> by Young Thug feat. Gunna & Travis Scott</p>');
					}
					elseif ($random_genre == "Country") {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/L25xkZntMdM"></iframe><br><p><i>Up Against the Wall, Red Neck</i> by Jerry Jeff Walker</p>');
					}
					elseif ($random_genre == "Classical") {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/4Tr0otuiQuU"></iframe><br><p><i>Moonlight Sonata</i> by Ludwig van Beethoven</p>');
					}
					else {
						echo('<iframe width="560" height="315" src="https://www.youtube.com/embed/UG3sfZKtCQI"></iframe><br><p><i>Monophobia</i> by deadmau5 feat. Rob Swire</p>');
					}	
				}
				else {
					echo('<p>Create a profile and log in to see personalized music</p>');
				}
			?>
			</div>
		</div>
	</div>
</html>

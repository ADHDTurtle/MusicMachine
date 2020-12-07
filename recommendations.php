<html>
	<head>
		<title>Recommendations</title>
		<link rel="stylesheet" href="style.css">
		
		<!--css for the rec page -->
		<style>
			body {
				text-align: center;
			}	
			table {
				margin: auto;
				text-align: left;
			}
			#tags {
				width: 200px;
			}
			#tophalf {
				border-bottom: 1px solid gray;
				padding: .5em;
			}
			#tophalf caption {
				font-size: 25px;
				font-weight: bold;
			}
			#leftnav {
				text-align: left;
				float: left;
				width: 20%;
				margin: 0;
				padding: 1em;
			}
			#feed {
				margin-left: 20%;
				border-left: 1px solid gray;
				padding: 1em;
				max-width: 70%;
			}
			#bothalf {
				margin-bottom: 10px;
				padding: 1em;
				box-sizing: content-box;
			}
		</style>
	</head>

<body>
	<div id="container">
		<div id="top">
			<a href="index.html">
			<img src="logo.png" alt="Music Machine Logo" class="logo">
			</a>
			<ul class="navbar">
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="discover.php">Discover</a></li>
				<li><a class="current">Recommendations</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="contact_us.html">Contact Us</a></li>
			</ul>
		</div>	

		<div id="content" style="margin-right:0px;">
			<h1 style="text-align: left;">Recommendations</h1>
			<div id="tophalf">
			<form action='create_rec.php' method='post'>
				<table>
					<caption>Make a Recommendation</caption>
					<tr>
						<th><label for="name" required>Name</label></th>
						<td><input type="text" id="name" name="name"></td>
					</tr>

					<tr>
						<th><label for="tags">Add Tags</label></th>
						<td><select id="tags" name="tags" multiple required>
							<option value="Pop">Pop</option>
							<option value="Country">Country</option>
							<option value="Alternative">Alternative</option>
							<option value="Rap">Rap</option>
							<option value="R&B">R&B</option>
							<option value="Rock">Rock</option>
							<option value="EDM">EDM</option>
						</select></td>
					</tr>

					<tr>
						<th>Your Recommendation</th>
						<td><textarea id="rec" name='rec' rows="8" cols="30" required></textarea></td>
					</tr>
					
					<tr>
						<td><input type='submit'></td>
						<td><input type="reset" value="Clear"></td>
					</tr>

				</table>
			</form>
			</div>

			<div id="bothalf">
				<div id="leftnav">
					<h2>Tags</h2>
					<ul>
						<li>Pop</li><br>
						<li>Country</li><br>
						<li>Alternative</li><br>
						<li>Rap</li><br>
						<li>R&B</li><br>
						<li>Rock</li><br>
						<li>EDM</li>
					</ul>
				</div>
				<div id="feed">
					<h2>View Recommendations</h2>
					<?php
						$file = fopen('recommendations.txt','r');
						while (!feof($file)) {
							$currentline = fgets($file);
							echo($currentline.'<br>');
						}
						fclose($file);	
					?>
					
				</div>
			</div>
		</div>

	</div>

	
</body>
</html>

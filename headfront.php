<?php
	require 'connect_db.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

		@import "compass/css3";
		@import url(https://fonts.googleapis.com/css?family=Vibur);
      body {margin:0;}

			.topnav {

  			position: relative;
  			background-color: #f3f3f3;
  			overflow: hidden;
				width: 100%;
			}

			/* Style the links inside the navigation bar */
			.topnav a {

  			float: left;
  			color: #666;
  			text-align: center;
  			padding: 14px 16px;
				border-radius: 25px;
  			border: 2px solid #FF4500;
  			text-decoration: none;
  			font-size: 20px;
				margin: 8px 0;
			}

			/* Change the color of links on hover */
			.topnav a:hover {
  			background-color: #ddd;
  			color: black;
			}

	/* Add a color to the active/current link */
			.topnav a.active {
				color: white;
	      background-color: #FF4500;
			}

			/* Right-aligned section inside the top navigation */
			.topnav-right {
				width: 40%;
  			float: right;

			}
			.topnav-right.a{
				float: right;
			}
			.topnav .search-container {

		   	float: left;
				margin-top: 5px;

			}
			.topnav input[type=text] {
				width: 70%;
				padding: 6px;
  			margin-top: 8px;
  			font-size: 20px;
  			border: 2px solid #FF4500;

			}
			.topnav .search-container button {
  			padding: 8px;
  			margin-top: 8px;
  			margin-right: 16px;
  			background: #FF4500;
  			font-size: 20px;
				border-radius: 25px;
  			border: 2px solid #FF4500;
  			cursor: pointer;
			}
			.topnav .search-container button:hover {
  		background: #ddd;
			}
			.l-but{
				float: right;
				color: #666;
				text-align: center;
				padding: 14px 16px;
				border-radius: 25px;
				border: 2px solid #FF4500;
				text-decoration: none;
				font-size: 20px;
				background-color: #f3f3f3;
				margin: 8px 0;


			}
			.l-but:hover{
				background-color: #ddd;
				color: black;
				cursor: pointer;
			}
    </style>

  </head>
  <body>

		<?php
				if (isset($_SESSION['user_ID'])) {
					if (!$conn) {
						session_destroy();

					}
					$session_id=$_SESSION['session_id'];
					$q= "select user_id, (unix_timestamp()-session_time) sessionAge from session where session_id='$session_id'";
					$res =mysqli_query($conn, $q);
					if (mysqli_errno($conn))
							{
								session_destroy();

							}
					if (mysqli_num_rows($res) == 0)
							{
								session_destroy();
							}

					$row= mysqli_fetch_assoc($res);
					if ($row['sessionAge']>3600) {
						session_destroy();
					}

				}

		 ?>

    <div class="topnav">
					<a href="homepage.php" class="fa fa-home active">Home</a>
      		<a href="#news">News</a>
				<div class="topnav-right">
					<div class="search-container">
		    		<form action="/action_page.php">
		      		<input type="text" placeholder="Search.." name="search">
							<span>
		      		<button type="submit"><i class="fa fa-search"></i></button>
						  </span>
		    		</form>
	  			</div>
					<form action="sign_up.php" method="post">
						 <button class="l-but" type="submit" name="sign-submit" <i class="fa fa-user"></i> Sign up</button>
				 </form>
				 	<form id="logform" action="login.php" method="post">
					 		<button id="logbut" class="l-but" type="submit" name="login-submit" <i class="fa fa-user"></i> Login</button>
				  </form>
					<?php
					if (isset($_SESSION['user_ID'])) {
					 ?>
					 <script>
					 document.getElementById('logbut').innerHTML=" Logout";
					  document.getElementById('logform').action=" logout.php";
					 </script>
					<?php
			   	}
					 ?>

				</div>
    </div>
					<?php

							if (isset($_GET['error'])) {
								if ($_GET['error']=="sqlerror") {
									echo '<script type="text/javascript">';
									echo ' alert("SQL error- User not found")';
									echo '</script>';
								}

							}

							?>


  </body>

  </html>

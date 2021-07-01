<?php

	require "headfront.php";
	require 'connect_db.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">


      <style>

			a:hover {
				color: red;
			}
      body {
      font-family: 'Work Sans', sans-serif;
      font-weight: 400;

      }

      h1,h2{

          text-align: center;
          font-family: 'Ultra', serif;
          font-weight: 400;
          font-size:30px;
          color: #FF4500;
      }

			h3{
				text-align: center;
				font-weight: 200;
				font-size:20px;
				color: #FF4500;
			}
			.war{
				display: none;
				text: 60px;
				color: #ff4500;
			}
			.center {
			  margin-left: auto;
			  margin-right: auto;
				margin-bottom: 10px;

			}

			table,th,td {
				border-collapse: collapse;
				font-weight: bold;
				width: 90%;
			}
			th,td {
			text-align: left;
			padding: 10px;

			}
			th{
			font-size: 30px;
			color: black;
			}
			tr{
				border-top: 1px solid lightgrey;
				border-bottom: 1px solid lightgrey;
			}

			.shadow{
				position: -webkit-sticky;
				position: sticky;
				top: 0;
				background-color: white;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				border-radius: 15px;
        border: 2px solid lightgrey;
			}
			.post{
				background-color: white;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				border: 2px solid white;
				padding: 10px;
			}
			.post1{
				background-color: #9fbfdf;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

				padding: 15px;
			}

      </style>

  </head>

  <body>

		<div class="shadow">
		<h1>Welcome to the</h1>
		<h2>BetaBus community</h2>
    <h3>Browse our categories and ask away:</h3>
	</div>
		<h4 id="war" class="war">The categories could not be displayed, try again later!</h4>

		<?php
					$q= "select * from category";
					$res =mysqli_query($conn, $q);

					if (!$res)
							{
								echo "<script>
									    document.getElementById('war').style.display='block';
								      </script>";
							}
					else {
									if (mysqli_num_rows($res) == 0)
											{
											echo "	<script>
												      document.getElementById('war').style.display='block';
												      document.getElementById('war').innerHTML='No categories defined yet!';
												      </script>";

										  }
									else {
												echo '<table class="center">
								        <tr>
									      <th>Category</th>
									      <th>Latest thread</th>
								        </tr>';

										  	while($row = mysqli_fetch_assoc($res))
								        {
								           echo '<tr>';
								           echo '<td>';
								           echo '<div class="post"><h4><a href="cat_view.php?id=' . $row['CAT_ID'] . '">' .$row['CAT_NAME']. '</a></h4>' .$row['CAT_SUBJECT']. '</div>';
								           echo '</td>';
								           echo '<td>';
								           echo '<div class="post1">';
													 $q1= 'select * from thread where THREAD_CAT=' . $row['CAT_ID'] . ' and THREAD_DATE in (select max(THREAD_DATE) from thread group by THREAD_CAT)';
													 $res1 =mysqli_query($conn, $q1);
													 if (mysqli_num_rows($res1) == 0)
				 											{
				 												echo 'No latest threads';
				 										  }
															else {
																 $row1 = mysqli_fetch_assoc($res1);
																 echo '<a href="thread_view.php?id=' . $row1['THREAD_ID'] . '">' .$row1['THREAD_NAME']. '</a></div>';
															}

								           echo '</td>';
								           echo '</tr>';
								         }
												 	echo '</table>';

								    }

						}
							mysqli_close($conn);

?>


  </body>

</html>

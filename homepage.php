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
      h2{

        text-decoration: underline;
        text-decoration-color: #FFD900;
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

			}

			table,th,td {
				border: 1px solid black;
				border-collapse: collapse;
			  font-weight: bold;

			}
			th,td {
			text-align: left;
			padding: 10px;

			}
			th{
			background-color: #FF4500;
			color: black ;

			}
			tr:nth-child(odd){
			background-color:	#ffdead;
			}
			tr:nth-child(even){
			background-color:#ffbf00;
			}



      </style>

  </head>

  <body>

    <h1>Welcome to the</h1>
		<h2>BetaBus community</h2>
    <h3>Browse our categories and ask away:</h3>
		<h4 id="war" class="war">The categories could not be displayed, try again later!</h4>

		<?php
				if (isset($_SESSION['user_ID'])) {
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
												echo '<table border="1" class="center">
								        <tr>
									      <th>Category</th>
									      <th>Last thread</th>
								        </tr>';

										  	while($row = mysqli_fetch_assoc($res))
								        {
								           echo '<tr>';
								           echo '<td>';
								           echo '<h3><a href="cat_view.php?id=' . $row['CAT_ID'] . '">' .$row['CAT_NAME']. '</a></h3>' .$row['CAT_SUBJECT'];
								           echo '</td>';
								           echo '<td>';
								           echo '<a href="thread.php?id=">Thread subject</a>';
								           echo '</td>';
								           echo '</tr>';
								         }

								    }

						}
							mysqli_close($conn);

				} ?>


  </body>

</html>

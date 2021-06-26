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
				text: 100px;
				color: #ff4500;
        text-align: center;
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
     <h4 id="war" class="war">The category could not be displayed, try again later!</h4>
	<?php
				if (isset($_SESSION['user_ID'])) {
					$q= "select * from category where CAT_ID='".addslashes($_GET['id'])."'";
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
												      document.getElementById('war').innerHTML='The category does not exist!';
												      </script>";

										  }
									 else {
                               while($row = mysqli_fetch_assoc($res))
                                {
                                  echo '<h2>Threads in the ′' . $row['CAT_NAME'] . '′ category:</h2>';
                                }

                                $q= "select * from thread where THREAD_CAT='".addslashes($_GET['id'])."'";
                      					$res1 =mysqli_query($conn, $q);
                      					if (!$res1)
                      							{
                      								echo "<script>
                      									    document.getElementById('war').style.display='block';
                                            document.getElementById('war').innerHTML='The topics could not be displayed, please try again later.!';
                      								      </script>";
                      							}
                                  else {
                                          if (mysqli_num_rows($res1) == 0)
                        									{
                                            echo "<script>
                                                  document.getElementById('war').style.display='block';
                                                  document.getElementById('war').innerHTML='There are no threads in this category yet!';
                                                  </script>";
                                          }
                                          else {
                                                  echo '<table border="1" class="center">
                                                  <tr>
                                                  <th>Thread</th>
                                                  <th>Created at</th>
                                                  </tr>';

                                                  while($row = mysqli_fetch_assoc($res1))
                                                  {
                                                     echo '<tr>';
                                                     echo '<td>';
                                                     echo '<h3><a href="thread_view.php?id=' . $row['THREAD_ID'] . '">' .$row['THREAD_NAME']. '</a></h3>';
                                                     echo '</td>';
                                                     echo '<td>';
                                                     echo date('d-m-Y', strtotime($row['THREAD_DATE']));
                                                     echo '</td>';
                                                     echo '</tr>';
                                                   }
                                               }

								                        }

						              }
							mysqli_close($conn);

		                }
                }
?>



  </body>

</html>

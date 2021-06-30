<?php

	require "headfront.php";
	require 'connect_db.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

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
					shadow: 10px 10px 5px grey;

      }
			h3{
				text-align: center;
				font-weight: 200;
				font-size:20px;
				color: #FF4500;
			}
			h4{
				text-align: center;
				font-weight: 200;
				font-size:20px;
				color: grey;
			}
			.war{
				display: none;
				text: 60px;
				color: #ff4500;
				text-align: center;
				border: 3px solid #ff4500;
			}
			.info{
			  text-align: center;
				text: 60px;
				color: #ff4500;
			}
			.center {
			  margin-left: auto;
			  margin-right: auto;

			}
			.Table-cont{
				margin-left: auto;
			  margin-right: auto;
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

			.form-container{
				width: 70%;
				border-radius: 5px;
				border: 3px solid #ff4500;
				background-color: #fefefe;
				margin-left: auto;
				margin-right: auto;
				margin-top: 5%;
				margin-bottom: 5%;
				padding: 20px;
			}
			input[type=text]{
				width: 100%;
			}
			textarea{
				width: 100%;
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
				font: Arial;
				font-size: 15px;
				font-weight: normal;
				line-height: 200%;
			}
			.post1{
				background-color: #9fbfdf;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

				padding: 15px;
			}

      </style>

  </head>

  <body>
     <h4 id="war" class="war">The category could not be displayed, try again later!</h4>

	<?php
  if(!isset($_SESSION['logged_in']))
	{
	    //the user is not signed in
	    echo '<h1>Sorry, you have to be <a href="/Forum1/login.php">logged in</a> to view the threads.</h1>';
	}
	else {
					$q= "select * from thread where THREAD_ID='".addslashes($_GET['id'])."'";
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
												      document.getElementById('war').innerHTML='The thread does not exist!';
												      </script>";

										  }
									 else {
                               while($row = mysqli_fetch_assoc($res))
                                {
                                  echo '<div class="shadow"><h2>' . $row['THREAD_NAME'] . '	</h2></div>';
																	echo '<br>';
																	echo '<h4>Asked: ' . $row['THREAD_DATE'] . '<br>Status: ' . $row['THREAD_STATUS'] . '</h4>';
                                }

                                $q= "select posts.post_id,
                                posts.post_message,
                                posts.post_date,
                                posts.post_thread,
                                posts.post_creator,
                                user.user_id,
                                user.user_name from posts left join user on posts.post_creator=user.user_id where POST_THREAD='".addslashes($_GET['id'])."'";
                      					$res1 =mysqli_query($conn, $q);
                      					if (!$res1)
                      							{
                      								echo "<script>
                      									    document.getElementById('war').style.display='block';
                                            document.getElementById('war').innerHTML='The posts could not be displayed, please try again later.!';
                      								      </script>";
                      							}
                                  else {
																					$_SESSION['thread_id']=$_GET['id'];
                                          if (mysqli_num_rows($res1) == 0)
                        									{
                                            echo "<script>
                                                  document.getElementById('war').style.display='block';
                                                  document.getElementById('war').innerHTML='There are no posts in this thread yet!';
                                                  </script>";
                                          }
                                          else {

                                                  echo '<table class="Table-cont">
                                                  <tr>
                                                  <th> All Post</th>
                                                  </tr>';

                                                  while($row1 = mysqli_fetch_assoc($res1))
                                                  {

																										 echo '<tr>';
                                                     echo '<td>';
																										 echo '<div class="post">'. $row1['post_message']. '</div>';
                                                     echo '</td>';
                                                     echo '<td> <div class="post1">';
																										 echo $row1['user_name'];
																										 echo '<br>';
                                                     echo $row1['post_date'];
                                                     echo '</div></td>';
                                                     echo '</tr>';

                                                   }

																									  echo '</table>';

                                               } ?>
																							 <?php

																													 if(!isset($_SESSION['logged_in']))
																													 {
																															 //the user is not signed in
																															 echo '<h1>Sorry, you have to be <a href="/Forum1/login.php">logged in</a> to post something.</h1>';
																													 }
																													 else {
																													 ?>
																														 <div class="form-container">
																														 <form class="" action="post_db.php" method="post">
																															 <div class="post-content">
																																 <div class="grid-title">
																																	 <div class="title-mid">
																																		 <h3><b>Add a reply?</b></h3>
																																		 <p>Clearly define your reply:</p>
																																	 </div>
																																	 <div class="body-input">
																																			<textarea id="subject" name="subject"
																																			placeholder="Write something.." style="height:200px"></textarea>
																																	 </div>
																																 </div>
																															 </div>
																															 <span id="war" class="war">Sorry, could not post a reply :(</span>
																															 <br>
																															 <button type="submit" name="post-submit">Reply</button>
																														 </form>
																													 </div>

																													 <script>

																															 <?php
																															if ($_GET['err']=="nocat") {
																																?>
																																document.getElementById('war').style.display='block';
																															<?php
																														} if($_GET['err']=="yess") {
																															?>
																															 document.getElementById('war').style.display='block';
																															 document.getElementById('war').style.color='#90EE90';
																															 document.getElementById('war').innerHTML='Successfully posted a reply.';
																															 <?php } ?>

																													 </script>
																													 <?php
																													 }

								                        }

						              }
							mysqli_close($conn);

		                }
                }
?>



  </body>

</html>

<?php
  if (isset($_POST['search-submit'])) {
  $search= $_POST['search'];
}
	require "headfront.php";
	require 'connect_db.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">
 		<link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script>
        if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
        }
    </script>
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
          font-family: 'Work Sans', sans-serif;

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
				text-align: center;
				border: 3px solid #ff4500;
			}
			.center {
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
			.sorry{
				text-align: center;
				margin-top: 20%;
			}
			.spans{
				width: 100%;
				text-align: center;
			}
			.btn{
				width: 100%;
				margin-left: auto;
				margin-right: auto;
				background-color:  #FF4500;

			}
			.parag{
				color: #FF4500;
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
     <h4 id="war" class="war">The category could not be displayed, try again later!</h4>
	<?php
  if(!isset($_SESSION['logged_in']))
	{
			?>
			<script type="text/javascript">
				$(window).on('load', function() {
						$('#myModal').modal('show');
				});
			</script>
			<div class="container">
				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Join the BetaBus Community</h4>
								<p class="parag">Join BetaBus to start earning reputation and unlocking new privileges like voting and commenting.</p>
								<br>
							 <button type="button" class="btn" data-dismiss="modal" onclick="document.location='sign_up.php'">Sign up</button>
								<br>
								<br>
								<span class="spans">Already have an account? <a href="/Forum1/login.php">Log in</a></span>
								<br>
							</div>
						</div>

					</div>
			</div>
		</div>
		<?php
	}
	else {

                                $q= "select * from thread where THREAD_name like '%".addslashes($_POST['search'])."%'";
                      					$res1 =mysqli_query($conn, $q);
                      					if (!$res1)
                      							{
                      								echo "<script>
                      									    document.getElementById('war').style.display='block';
                                            document.getElementById('war').innerHTML='Error, please try again later.!';
                      								      </script>";
                      							}
                                  else {
                                          if (mysqli_num_rows($res1) == 0)
                        									{
                                            echo "<script>
                                                  document.getElementById('war').style.display='block';
                                                  document.getElementById('war').innerHTML='Sorry no threads could be found!';
                                                  </script>";
                                          }
                                          else {

                                                  echo '<table class="center">
                                                  <tr>
                                                  <th>Thread</th>
                                                  <th>Created on</th>
                                                  </tr>';

                                                  while($row = mysqli_fetch_assoc($res1))
                                                  {
                                                     echo '<tr>';
                                                     echo '<td>';
                                                     echo '<div class="post"><h4><a href="thread_view.php?id=' . $row['THREAD_ID'] . '">' .$row['THREAD_NAME']. '</a></h4>' . $row['THREAD_DESCRIPT']. '</div>';
                                                     echo '</td>';
                                                     echo '<td>';
                                                     echo '<div class="post1">'. date('d-m-Y', strtotime($row['THREAD_DATE'])). '</div>';
                                                     echo '</td>';
                                                     echo '</tr>';
                                                   }
                                               }

								                        }

	 }
							mysqli_close($conn);

?>



  </body>

</html>

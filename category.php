<?php
	require 'connect_db.php';
	require 'headfront.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css?family=Ultra|Work+Sans:400,500" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<style>
		body{
				 background-color: white;
				 font-family: 'Work Sans', sans-serif;
	       font-weight: 400;
			 }
			 .form-container{
				 width: 50%;
				 border-radius: 5px;
				 border: 3px solid #ff4500;
				 background-color: #fefefe;
				 margin-left: auto;
				 margin-right: auto;
				 margin-top: 5%;
				 padding: 20px;
			 }
			 input[type=text]{
				 width: 100%;
			 }
			 textarea{
				 width: 100%;
			 }
			 .war{
				 display: none;
				 text: 60px;
				 color: #ff4500;
			 }
			 h2{
				 text-align: center;
				 margin-top: 20%;
				 border: 3px solid #ff4500;
			 }
			 h1{
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

</style>
</head>
<body>
	<?php
	if(isset($_SESSION['user_Level']) && $_SESSION['user_Level']==1)
	{
			//the user is not an admin
			echo '<h2>Sorry, only admins can create a category. Ask an admin to create a category.</h2>';
	}
	else {

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
				?>
					<div class="form-container">
			    <form class="" action="cat_db.php" method="post">
			      <div class="post-title">
			        <div class="grid-title">
			          <div class="title-top">
			            <h3><b>Category name</b></h3>
			            <p>Be specific and create any thread your heart (and our policy) desires</p>
			          </div>
			          <div class="title-input">
			            <input type="text" name="title" maxlength="300" placeholder="e.g. Unicorns and rainbows">
			          </div>
			        </div>
			      </div>
			      <div class="post-content">
			        <div class="grid-title">
			          <div class="title-mid">
			            <h3><b>Category description</b></h3>
			            <p>Include all the necessary content to describe your category</p>
			          </div>
			          <div class="body-input">
			             <textarea id="subject" name="subject"
			             placeholder="Write something.." style="height:200px"></textarea>
			          </div>
			        </div>
			      </div>
						<span id="war" class="war">Sorry, could not create a category :(</span>
					  <br>
			      <button type="submit" name="cat-submit">Create category</button>
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
						document.getElementById('war').innerHTML='Successfully created a category.<br>You can now <a href="homepage.php">view</a> it and start posting! :)';

						<?php } ?>



				</script>
				<?php
				}
			}
?>

</body>
</html>

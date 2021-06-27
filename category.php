<?php
	//session_start();
	require 'connect_db.php';
	require 'headfront.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
		body{
				 background-color: #fef4ea;
			 }
			 .form-container{
				 width: 50%;
				 border-radius: 5px;
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
</style>
</head>
<body>

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


</body>
</html>

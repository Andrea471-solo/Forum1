<?php
	//session_start();
	require 'connect_db.php';
	require 'headfront.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<style>


			.error {color: #FF0000;}

			h1{
			  font-size: 40px;
			  font-family: Calibri, sans-serif;
			  font-weight:lighter;


			}
			.headsup{
				font-size: 40px;
			  font-family: Calibri, sans-serif;
			  font-weight:lighter;
				display: none;
			}
			input[type="submit"]{
			  width: 70%;
			  border-radius: 20px;
			  padding: 10px;
			  border: 1px solid #ff4500;
			  background-color: #ff4500;
			  color: white;
			}

			label{
			font-size: 18px;

			}

			.grid-container{
			  display: grid;
			  grid-template-columns: auto auto;
			  background-color: #fefefe;
			  padding: 10px;
			  margin-left: 80px;
			  margin-right: 80px;
			}

			.grid-item-about{
			  width: 500px;
			  height: 400px;
			  background-color: inherit;
			  /*border: 1px solid black;*/
			  padding: 10px;
			  margin-right: 48px;
			  margin-bottom:128px;
			  margin-top: 20%;
			  font-size: 30px;
			  text-align: center;
			}
			.grid-item-su{

			  height: 500px;
			  background-color: inherit;
			  border: 3px solid #ff4500;
			  padding-left: 10px;
			  padding-top: 40px;
			  margin-right: 48px;
			  margin-bottom:100px;
			  margin-top: 10%;
			  font-size: 25px;
			  font-family: Arial, sans-serif;
			  text-align: center;
			}

			.grid-list{
			  display: grid;
			  grid-template-columns: 50px auto;
			  /*border: 1px solid red;*/
			  text-align: left;
			  padding-bottom: 20px;
			}
			.sub-grid{
			  display: grid;
			  grid-template-columns: auto auto;
			  /*border: 1px solid red;*/
			  text-align: left;
			  padding-bottom: 10px;
			  padding-left: 30px;
			}

			.grid-img{
			  width: auto;
			  /*border: 1px solid black;*/
			  padding-right: 1px;
			  margin-top: auto;
			}

			.span-about{
			  font-size: 20px;
			  /*border: 1px solid green;*/
			  text-align: left;
			  padding-top: 6px;
			  display: flex;

			}
			.alert{
				display: none;
				text: 30px;
				color: #ff4500;

			}
			h2{
				text-align: center;
				margin-top: 20%;
			}


</style>
</head>
<body>
	<?php
if(isset($_SESSION['logged_in']))
	{
	    //the user is not signed in
	    echo '<h2>Looks like you are already logged in :)</h2>';
	}
	else {
?>

<?php
// define variables and set to empty values
		$nameErr = $emailErr = $pswErr = "";
		$name = $email = $psw = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
		    $nameErr = "Name is required";
		  } else {
		    $name = test_input($_POST["name"]);
		    // check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		      $nameErr = "Only letters and white space allowed";
		    }
		  }

		  if (empty($_POST["email"])) {
		    $emailErr = "Email is required";
		  } else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailErr = "Invalid email format";
		    }
		  }


		  if (empty($_POST["psw"])) {
		    $pswErr = "Password is required";
		  } else {
		    $psw = test_input($_POST["psw"]);
		  }
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		?>
  <h1 class="headsup" mb32 lh-xs ></h1>
<div class="grid-container">
  <div class="grid-item-about">
    <h1 mb32 lh-xs >Join the Beta Bus community</h1>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum1/rsc/question.jpg" alt="Q" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Ask no questions -and hear no lies</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum1/rsc/vote1.jpg" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Vote with your feet</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum1/rsc/level.jpg" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Step up your game -and level up</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum1/rsc/com.jpg" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Become part of a community</span>
    </div>
  </div>
  <div class="grid-item-su">
    <form method="post" action="signup_verify.php">
      <div class="sub-grid">
        <label for="name">Username</label>
        <br>
        <input type="text" name="usname" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
      </div>
      <br>
      <div class="sub-grid">
        <label for="email">Email</label>
        <br>
        <input type="text" name="usemail" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
      </div>
      <br>
      <div class="sub-grid">
        <label for="psw">Password</label>
        <br>
        <input type="password" name="psw" value="<?php echo $psw;?>">
        <span class="error">* <?php echo $pswErr;?></span>
      </div>
      <br>
      <div class="sub-grid">
        <label for="psw">Confirm Password</label>
        <br>
        <input type="password" name="pswc" value="<?php echo $psw;?>">
        <span class="error">* <?php echo $pswErr;?></span>
      </div>
			<br>
			<span id="alert"class="alert">The two passwords did not match</span>
      <br>
        <input type="submit" name="signup-submit" value="Sign Up">
    </form>
  </div>
</div>
<script>


		<?php
		if ($_GET['error']=="success") {?>
		 document.getElementById('alert').style.display='block';
	 	 document.getElementById('alert').innerHTML='Successfully registered.<br>You can now <a href="login.php">log in</a> and start posting! :)';
		<?php
		}?>

	 <?php
	 if ($_GET['error']=="confirmpsw") {?>
	 document.getElementById('alert').style.display='block';
	 <?php
	 }?>

	 <?php
	 if ($_GET['error']=="username exists") {?>
	 document.getElementById('alert').style.display='block';
	 document.getElementById('alert').innerHTML='Sorry this Username already exists';
	 <?php
	 }?>



</script>

<?php } ?>

</body>
</html>

<?php

	//session_start();
	require 'connect_db.php';
	require 'headfront.php';
	//include 'login_verify.php';
?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

      form {
        border: 3px solid #f1f1f1;
      }

      /* Full width inputs*/
      .s-input{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ff4500;
        box-sizing: border-box;
      }
			.animat{
				animation-name: shake, glow-red;
  			animation-duration: 2s, 0.5s;
  			animation-iteration-count: 1, 2;

			}

      /* Set a style for all buttons */
      .login-but {
        background-color: #ff4500;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      /* Add a hover effect for buttons */
      .login-but:hover {
        opacity: 0.8;
      }

      /* Extra style for the cancel button (red) */
      .cancelbutton {
        width: auto;
        padding: 10px 18px;
        background-color: green;
      }
      .cancelbutton:hover {
        opacity: 0.8;
      }


      /* Center the avatar image inside this container */
      .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
      }

      img.avatar {
        width: 20%;
        height: 20%;
        border-radius: 40%;
      }

      /* Add padding to containers */
      .container {
        padding: 16px;
      }

      /* The "Forgot password" text */
      span.psw {
        float: right;
        padding-top: 16px;
      }

      .mod-content {

        background-color: #fefefe;
        margin-top: 50px;
        margin-left: 25%;
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */

      }

      /* The Close Button */
      .close {
        /* Position it in the top right corner outside of the modal */
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
      }

      /*When hovering over close button*/
      .close:hover, .close:focus{
        color: #ff4500;
        cursor: pointer;
      }


      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 200px) {
        span.psw {
          display: block;
          float: none;
        }

      }

			@keyframes shake {
			  0%, 20%, 40%, 60%, 80% {
			    transform: translateX(8px);
			  }
			  10%,
			  30%,
			  50%,
			  70%,
			  90% {
			    transform: translateX(-8px);
			  }
			}

			@keyframes glow-red {
			  50% {
			    border-color: indianred;
			  }
			}

			.alert{
				display: none;
				text: 50px;
				color: #ff4500;

			}


</style>
</head>
<body>


    <form class="mod-content animate" action="login_verify.php" method="post">
      <div class="imgcontainer">
        <img src="/Forum1/rsc/sign_in.jpg" alt="Sign-in icon" class="avatar"></img>
      </div>

      <div class="container">
        <label for="usname"><b>Username</b></label>
        <input class="s-input" type="text" name="usname" placeholder="Enter Username" required>

        <label for="psw">Password</label>
        <div class="log-status">
        <input id="s-input" class="s-input" type="password" name="psw" placeholder="Enter Password" required>
        </div>

        <button id="btn"class="login-but"type="submit" name="login-submit" data-toggle="tooltip" title="At the touch of a button">Login</button>
        <span id="alert"class="alert">User does not exist. Sign up first to start posting!</span>

      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbutton">Cancel</button>
        <span class="psw"><a href="#">Forgot password?</span>
      </div>
    </form>

    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
		</script>
		<script>

		  document.getElementById('btn').addEventListener('click', function () {
	    document.getElementById('s-input').classList.add('animat');

	 });
	     <?php
			 if ($_GET['error']=="nomatch") {?>
			 document.getElementById('alert').style.display='block';
			 <?php
		 	 }?>
			 <?php
			 if ($_GET['error']=="incorrectpsw") {?>
			 document.getElementById('alert').style.display='block';
			 document.getElementById('alert').innerHTML='Sorry you entered the wrong password';
			 <?php
		   }?>

				<?php
				if ($_GET['error']=="already") {
				 ?>
				 document.getElementById('alert').style.display='block';
				 document.getElementById('alert').innerHTML='Looks like you are already signed in. You can <a href="signout.php">sign out</a> if you want.';
				<?php
				}
				 ?>

		</script>

</body>
</html>

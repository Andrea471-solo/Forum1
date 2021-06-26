<?php
if (isset($_POST['signup-submit'])) {
  require 'connect_db.php';
  session_start();
  $username= $_POST['usname'];
  $email=$_POST['usemail'];
  $password=$_POST['psw'];
  $passwordc=$_POST['pswc'];

  if($password !== $passwordc)
	{
		header("Location:sign_up.php?error=confirmpsw");
		exit();
  }
  else if (isset($_POST['usname']) && isset($_POST['usemail']) && isset($_POST['psw']) && isset($_POST['pswc'])) {
				$q= "select * from user where user_name='".addslashes($_POST['usname'])."'";
				$res= mysqli_query($conn, $q);
				if ($res) {
            if (mysqli_num_rows($res)>0) {
              header("Location:sign_up.php?error=username exists");
				      exit();
            }
            else{
                $q="insert into user (user_name,user_pass,user_email,user_date,user_level) values ('$username','".hash('sha256',$password)."','$email', unix_timestamp(), 1)";
                $res=mysqli_query($conn, $q);
                header("Location:sign_up.php?error=success");
                exit();
              }
  					}

        else {
          header("Location:login.php?error=sqlerror");
          exit();
        }
			}
			mysqli_close($db);

}




 ?>

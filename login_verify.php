<?php
if (isset($_POST['login-submit'])) {
  require 'connect_db.php';
  session_start();
  $username= $_POST['usname'];
  $password=$_POST['psw'];
  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
  {
      header("Location:login.php?error=already");
      exit();
  }
  else{
  if (isset($_POST['usname']) && isset($_POST['psw'])) {
      				$q= "select * from user where user_name='".addslashes($_POST['usname'])."'";
            //  header("Location:headfront.php?match");
      				$res= mysqli_query($conn, $q);
      				if ($res) {
                  if (mysqli_num_rows($res)==1) {
                    $row= mysqli_fetch_assoc($res);

                    if (hash('sha256',$password)!=$row['USER_PASS']) {
                      header("Location:login.php?error=incorrectpsw");
                      exit();
                    }
                    else{
                      session_start();
                      $_SESSION['user_ID']   = $row['USER_ID'];
      					      $_SESSION['user_Name'] = $row['USER_NAME'];
                      $_SESSION['user_Level'] = $row['USER_LEVEL'];
                      $_SESSION['logged_in'] = true;
                      $session_id= hash('sha256',time().$row['USER_ID']);
                      $q="insert into session (user_id, session_id, session_time) values (".$row['USER_ID'].", '$session_id', unix_timestamp())";
                      $res=mysqli_query($conn, $q);
                      $_SESSION['session_id']=$session_id;
                    header("Location:homepage.php?login=success");
                      exit();
                    }
        					}
                  else {
                    header("Location:login.php?error=nomatch");
        			      exit();
                  }
      				}
              else {
                header("Location:login.php?error=sqlerror");
                exit();
              }
      			}
      			mysqli_close($conn);

      }


}


 ?>

<?php
if (isset($_POST['post-submit'])) {
  require 'connect_db.php';
  session_start();
  $postmessage=$_POST['subject'];
  $threadid=$_SESSION['thread_id'];
  $userid=$_SESSION['user_ID'];

  if (isset($_POST['subject'])) {
      		   	$q="insert into posts (POST_MESSAGE, POST_DATE,POST_THREAD,POST_CREATOR) values ('".addslashes($postmessage)."', NOW(),$threadid ,$userid)";
      				$res= mysqli_query($conn, $q);
      				if ($res) {
                    header("Location:thread_view.php?err=yess&id=$threadid");
                    exit();

              }
              else{
                    header("Location:thread_view.php?err=nocat&id=$threadid");
                    exit();
                  }

      			}
      			mysqli_close($db);

      }


 ?>

<?php
if (isset($_POST['cat-submit'])) {
  require 'connect_db.php';
  session_start();
  $catname= $_POST['title'];
  $catdesc=$_POST['subject'];

  if (isset($_POST['title']) && isset($_POST['subject'])) {
      		   	$q="insert into category (CAT_NAME, CAT_SUBJECT) values ('".addslashes($catname)."', '".addslashes($catdesc)."')";
      				$res= mysqli_query($conn, $q);
      				if ($res) {
                    header("Location:category.php?err=yess");
                    exit();

              }
              else{
                    header("Location:category.php?err=nocat");
                    exit();
                  }

      			}
      			mysqli_close($db);

      }


 ?>

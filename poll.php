<?php
session_start();

if(isset($_GET['vote'])){

$vote = $_GET['vote'];
$poll_post= $_GET['id'];
$threadid=$_SESSION['thread_id'];

require 'connect_db.php';
if($vote==1){
$poll_content= 'upvote';
}
else {
$poll_content= 'downvote';
}
$poll_creator= $_SESSION['user_ID'];

$contains = mysqli_query($conn, "select count(*) c from poll where poll_creator = '$poll_creator' and poll_post = '$poll_post';");
$r = mysqli_fetch_assoc($contains);
$resul = mysqli_query($conn, "select poll_content from poll where poll_creator = '$poll_creator' and poll_post = '$poll_post';");
$result = mysqli_fetch_assoc($resul);

if($r['c']== '0'){
  $sql = "INSERT into poll (poll_content, poll_date, poll_creator, poll_post)
  VALUES ('$poll_content', NOW(), $poll_creator, $poll_post);";
  $conn->query($sql);

}
if($poll_content=='upvote'&&$result['poll_content'] == 'downvote'){

  $sql = "UPDATE poll set poll_content = 'upvote' where poll_creator = '$poll_creator' and poll_post = '$poll_post';";
  $conn->query($sql);
}
else if($poll_content=='downvote'&&$result['poll_content'] == 'upvote'){

  $sql = "UPDATE poll set poll_content = 'downvote' where poll_creator = '$poll_creator' and poll_post = '$poll_post';";
  $conn->query($sql);
}
header("Location:thread_view.php?id=$threadid&postid=$poll_post");


  $q = "select count(*) total_up from poll where poll_content like '%up%' and poll_post = '$poll_post';";
  $query = "select count(*) total_down from poll where poll_content like '%down%' and poll_post = '$poll_post';";
  $res= mysqli_query($conn, $q);
  $res2= mysqli_query($conn, $query);

  if ($res&&$res2) {
  		if (mysqli_num_rows($res)==1&&mysqli_num_rows($res2)==1) {
  			$row= mysqli_fetch_assoc($res);
        $row2= mysqli_fetch_assoc($res2);
        $diff = ($row['total_up']-$row2['total_down']);

  			}
  		}
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



 ?>

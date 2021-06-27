<?php
session_start();

if(isset($_REQUEST['vote'])){

$vote = $_REQUEST['vote'];

require 'connect_db.php';

$poll_content= $vote;
$poll_creator= $_SESSION['user_ID'];
$poll_post= 8;

$sql = "INSERT INTO poll (poll_content, poll_date, poll_creator, poll_post)
VALUES ('$poll_content', NOW(), $poll_creator, $poll_post)";

if ($conn->query($sql) === TRUE) {
  $q = "select count(*) total_up from poll where poll_content like '%up%' and poll_post = '$poll_post';";
  $query = "select count(*) total_down from poll where poll_content like '%down%' and poll_post = '$poll_post';";
  $res= mysqli_query($conn, $q);
  $res2= mysqli_query($conn, $query);

  if ($res&&$res2) {
  		if (mysqli_num_rows($res)==1&&mysqli_num_rows($res2)==1) {
  			$row= mysqli_fetch_assoc($res);
        $row2= mysqli_fetch_assoc($res2);
  				echo ($row['total_up']-$row2['total_down']);
  			}
  		}
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

 ?>

<?php
	require 'connect_db.php';
	require 'headfront.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

  <style media="screen">

    body{
      background-color: white;
    }
    .form-container{
      width: 50%;
      border-radius: 5px;
			border: 3px solid #ff4500;
      background-color: #fefefe;
      margin-left: auto;
      margin-right: auto;
      margin-top: 5%;
      margin-bottom: 10%;
      padding: 20px;
    }
    input[type=text]{
      width: 100%;
    }
    textarea{
      width: 100%;
      margin-bottom: 10px;
    }
    .img-container{
      border: 1px solid black;
      margin-top: 1px;
      margin-bottom: 10px;
      text-align: center;
    }
    img {
    width: 400px;
    height: 400px;
    object-fit: contain;
    }

  </style>
  </head>
  <body>
<?php
if($_SESSION['logged_in'] == false)
{
    //the user is not signed in
    echo 'Sorry, you have to be <a href="/Forum1/login.php">signed in</a> to post something.';
}
else {
?>

<div class="form-container">
  <form>
    <div class="post-title">
      <div class="grid-title">
        <div class="title-top">
          <h3><b>Title</b></h3>
          <p>Be specific and ask any question your heart (and our policy) desires</p>
        </div>
        <div class="title-input">
          <input type="text" id="title" name="title" maxlength="300" value="<?php echo $_POST['title1']; ?>">

        </div>
      </div>
    </div>
    <div class="post-content">
      <div class="grid-title">
        <div class="title-mid">
          <h3><b>Body</b></h3>
          <p>Include all the necessary content to help answer your question</p>
        </div>
        <div class="body-input">
           <textarea id="subject" name="subject"
           style="height:200px"> <?php echo $_POST['subject1']; ?> </textarea>
        </div>
      </div>
    </div>
  </form><br>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Attach an image:
    <input type="file" id="img" name="img" onchange="readURL(this);" accept="image/*"><br>
  <div class="img-container">
    <img id="img" alt="your image">
    <script type="text/javascript">
      posting=false;
    </script>
  <button type="submit" id="upload-but" name="upload-but">Post</button>

  </form>
  </div>
</div>
<?php
}
?>
<script type="text/javascript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('img')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<?php
if(isset($_POST['submit-but'])){

$cat_id= $_POST['cat'];
$thread_creator= $_SESSION['user_ID'];

$sql = "INSERT INTO thread (thread_name, thread_descript, thread_date, thread_status, thread_creator, thread_cat)
VALUES ('" . addslashes($_POST['title1']) . "', '" . addslashes($_POST['subject1']) . "', NOW(),'active', $thread_creator , $cat_id )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$q= "select * from thread where thread_name='".addslashes($_POST['title1'])."'";
$res= mysqli_query($conn, $q);
if ($res) {
		if (mysqli_num_rows($res)==1) {
			$row= mysqli_fetch_assoc($res);

				$_SESSION['THREAD_ID']   = $row['THREAD_ID'];
			}
		}

$conn->close();
}
 ?>


  </body>
</html>

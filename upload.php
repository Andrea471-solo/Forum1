

<?php
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check == false) {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  $target_file = $target_dir . hash_file('sha256', $_FILES["img"]["tmp_name"]);
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
    $_SESSION['uploaded'] = true;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


if (isset($_POST['upload_but'])) {
  require 'connect_db.php';

  $img_name= hash_file('sha256', $_FILES["img"]["tmp_name"]);
  $image_by= $_SESSION['user_ID'];
  $img_size= $_FILES["img"]["size"];
  $image_in= 1;
  $image_thread= $_SESSION['THREAD_ID'];
  if (isset($_POST['usname']) && isset($_POST['psw'])) {
				$q= "select * from user where user_name='".addslashes($_POST['usname'])."'";
      //  header("Location:headfront.php?match");
				$res= mysqli_query($conn, $q);
				if ($res) {


 ?>

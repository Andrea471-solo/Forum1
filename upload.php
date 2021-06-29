

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
  $img_name= hash_file('sha256', $_FILES["img"]["tmp_name"]);
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
    $_SESSION['uploaded'] = true;

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


if (isset($_FILES['img'])) {
  require 'connect_db.php';


  $image_by= $_SESSION['user_ID'];
  $img_size= $_FILES["img"]["size"];
  $image_in= 1;
  $image_thread= $_SESSION['THREAD_ID'];

  $sql = "INSERT INTO image (image_by, image_name, image_size, image_thread)
  VALUES ('$image_by', '$img_name', $img_size, $image_thread)";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location:homepage.php");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  }


 ?>

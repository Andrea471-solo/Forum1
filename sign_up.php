<!DOCTYPE HTML>
<html>
<head>
<style>


.error {color: #FF0000;}

h1{
  font-size: 40px;
  font-family: Calibri, sans-serif;
  font-weight:lighter;


}
input[type="submit"]{
  width: 70%;
  border-radius: 20px;
  padding: 10px;
  border: 1px solid #ff4500;
  background-color: #ff4500;
  color: white;
}

label{
font-size: 18px;

}

.grid-container{
  display: grid;
  grid-template-columns: auto auto;
  background-color: #fefefe;
  padding: 10px;
  margin-left: 80px;
  margin-right: 80px;
}

.grid-item-about{
  width: 500px;
  height: 400px;
  background-color: inherit;
  /*border: 1px solid black;*/
  padding: 10px;
  margin-right: 48px;
  margin-bottom:128px;
  margin-top: 20%;
  font-size: 30px;
  text-align: center;
}
.grid-item-su{
  height: 500px;
  height: 400px;
  background-color: inherit;
  border: 3px solid #ff4500;
  padding-left: 10px;
  padding-top: 50px;
  margin-right: 48px;
  margin-bottom:100px;
  margin-top: 20%;
  font-size: 25px;
  font-family: Arial, sans-serif;
  text-align: center;
}

.grid-list{
  display: grid;
  grid-template-columns: 50px auto;
  /*border: 1px solid red;*/
  text-align: left;
  padding-bottom: 20px;
}
.sub-grid{
  display: grid;
  grid-template-columns: auto auto;
  /*border: 1px solid red;*/
  text-align: left;
  padding-bottom: 10px;
  padding-left: 30px;
}

.grid-img{
  width: auto;
  /*border: 1px solid black;*/
  padding-right: 1px;
  margin-top: auto;
}

.span-about{
  font-size: 20px;
  /*border: 1px solid green;*/
  text-align: left;
  padding-top: 6px;
  display: flex;

}


</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $pswErr = "";
$name = $email = $psw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


  if (empty($_POST["psw"])) {
    $pswErr = "Password is required";
  } else {
    $psw = test_input($_POST["psw"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="grid-container">
  <div class="grid-item-about">
    <h1 mb32 lh-xs >Join the Beta Bus community</h1>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum/Forum.git/rsc/question.png" alt="Q" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Ask no questions -and hear no lies</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum/Forum.git/rsc/vote1.png" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Vote with your feet</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum/Forum.git/rsc/level.png" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Step up your game -and level up</span>
    </div>
    <div class="grid-list">
      <div class="grid-img">
        <svg class="ques" height="10" width="10">
          <img src="/Forum/Forum.git/rsc/com.png" alt="arrow" height="26" width="26">
        </svg>
      </div>
      <span class="span-about">Become part of a community</span>
    </div>
  </div>
  <div class="grid-item-su">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="sub-grid">
        <label for="name">Username</label>
        <br>
        <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
      </div>
      <br>
      <div class="sub-grid">
        <label for="email">Email</label>
        <br>
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
      </div>
      <br>
      <div class="sub-grid">
        <label for="psw">Password</label>
        <br>
        <input type="password" name="psw" value="<?php echo $psw;?>">
        <span class="error">* <?php echo $pswErr;?></span>
      </div>
      <br><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
  </div>
</div>
</body>
</html>

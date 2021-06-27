<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
function getVote(string) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("voted").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll.php?vote="+string,true);
  xmlhttp.send();
}
</script>
  </head>
  <style media="screen">
.triangle-up {
width: 0;
height: 0;
border-left: 25px solid transparent;
border-right: 25px solid transparent;
border-bottom: 30px solid #555;
}
.triangle-up:hover {
width: 0;
height: 0;

border-left: 25px solid transparent;
border-right: 25px solid transparent;
border-bottom: 30px solid #ff4500;
}
button[type="submit"]{

background-color: white;
border: none;
cursor: pointer;
margin-left: auto;
margin-right: auto;
margin-top: auto;
margin-bottom: auto;
}
.triangle-down {
width: 0;
height: 0;
border-left: 25px solid transparent;
border-right: 25px solid transparent;
border-top: 30px solid #555;
}
.triangle-down:hover {
width: 0;
height: 0;

border-left: 25px solid transparent;
border-right: 25px solid transparent;
border-top: 30px solid #ff4500;
}
.voting-container{
  display: grid;
  grid-template-columns: auto auto auto;
  text-align: center;
  height: 70px;
  width: 210px;

}
.grid-item{
width: 70px;
vertical-align: middle;

}

  </style>
  <body>
<div id="poll">
  <div class="voting-container">
    <button class="grid-item" type="submit" value="upvote" onclick="getVote(this.value)">
        <div class="triangle-up" background="white"></div>
    </button>
    <div class="grid-item">
      <div id="voted" class="vote-count">

      </div>
    </div>
    <button class="grid-item" value="downvote" onclick="getVote(this.value)" type="submit">
        <div class="triangle-down"  background="white"></div>
    </button>
  </div>
</div>

  </body>
</html>

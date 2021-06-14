<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
   </script>
  <style media="screen">

    body{
      background-color: #fef4ea;
    }
    .form-container{
      width: 50%;
      border-radius: 5px;
      background-color: #fefefe;
      margin-left: auto;
      margin-right: auto;
      margin-top: 5%;
      padding: 20px;
    }
    input[type=text]{
      width: 100%;
    }
    textarea{
      width: 100%;
    }

  </style>
  </head>
  <body>

  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Rules for posting in this forum</h4>
          </div>
          <div class="modal-body">
            <p>1) No fowl language.</p><br>
            <p>2) Be conciderate of others</p><br>
            <p>3) Enjoy</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
  </div>
</div>

<div class="form-container">
  <form class="" action="index.html" method="post">
    <div class="post-title">
      <div class="grid-title">
        <div class="title-top">
          <h3><b>Title</b></h3>
          <p>Be specific and ask any question your heart (and our policy) desires</p>
        </div>
        <div class="title-input">
          <input type="text" name="title" maxlength="300" placeholder="e.g. What is the length of an average sized unicorn's horn?">
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
           placeholder="Write something.." style="height:200px"></textarea>
        </div>
      </div>
    </div>
    <button type="submit" name="submit-but">Post</button>
  </form>
</div>

<?php
  echo title;


 ?>
  </body>
</html>

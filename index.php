<?php
$errMsg = "";
$sucMsg = "";
if($_GET["email"]){
  if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
    $errMsg += "It is not a valid email address";
  }
}
else{
  $errMsg += "Email address is required";
}
if(!$_GET["subject"]){
  $errMsg += "Subject is required";
}
if(!$_GET["text_area"]){
  $errMsg += "Query is required";
}

if(sizeof($errMsg) == 0){
  $errMsg = "";
  $emailTo = "asociton@outlook.com";
  $subject = $_GET["subject"];
  $body = $_GET["text_area"];
  $headers = "From: ".$_GET["email"];
  if(mail($emailTo,$subject,$body,$headers){
    $sucMsg = "Email send successfully!";
  }
  else{
    $errMsg = "Try again later";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Form</title>
    <script type = "text/javascript" src = "jquery-3.3.1.min.js"></script>
    <style type = "text/css">

      #err{
        display: none;
      }

      #suc{
        display: none;
      }

    </style>
  </head>
  <body>
    <div class = "container">
      <h1>Get in touch!</h1>
      <div class="alert alert-danger" id="err">
        <?
        echo $errMsg.$sucMsg;
        ?>
      </div>
      <div class="alert alert-success" id="suc">
        Your form has been submitted, we will get back to you soon!
      </div>
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Subject</label>
          <input class="form-control" name="subject" id="subject1" type="text">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Enter your query here</label>
          <textarea class="form-control" name="text_area" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type = "text/javascript">
      function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
      }

      $("form").submit(function(e){
        e.preventDefault();
        var err_msg = "";
        if(isEmail($("#exampleInputEmail").val())){
        }
        else{
          err_msg += "Invalid email, please recheck it.";
        }
        if($("#subject1").val().length == 0){
          err_msg += "<br>Subject cannot be blank.";
        }
        if($("#exampleFormControlTextarea1").val().length == 0){
          err_msg += "<br>Text area cannot be blank.";
        }
        if(err_msg.length > 0){
          $("#err").html(err_msg);
          $("#err").css("display","block");
        }else{
          $("#err").css("display","none");
          $("#suc").css("display","block");
          $("form").unbind("submit").submit();
        }

      });
    </script>

  </body>
</html>

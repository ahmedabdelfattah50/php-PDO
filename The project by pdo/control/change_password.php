<?php 

require_once "../inc/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Simple Registration form - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <!-- Form Name -->
    <legend>Change password</legend>    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="username">username (or) email</label>  
      <div class="col-md-8">
      <input id="username" name="username" type="text" placeholder="Enter your username (or) email" class="form-control input-md">
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submitBtn"></label>
      <div class="col-md-4">
        <button id="submitBtn" name="submitBtn" class="btn btn-primary">Login</button>
      </div>
    </div>
</form>
<script type="text/javascript">

</script>
</body>
</html>

<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $stmt = $con->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
        $stmt->execute([
            'username' => $username,
            'email'    => $username
        ]);
        if($stmt->rowCount()){
            $stmt = $con->prepare("UPDATE users SET reset_token=:token_val");
            $stmt->execute([
                'token_val' => sha1($username) . sha1(date('Y-m-d H-i'))
            ]);

            if($stmt->rowCount()){
                
            }

            // $stmt = $con->prepare("SELECT * FROM users");
            // $stmt->execute();

        } else {
            die("The username or email is not exist");
        }
    } else {
        die("The username or email is not exist");
    }
?>
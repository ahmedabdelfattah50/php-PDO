
<?php

require_once "../inc/connection.php";

if(isset($_POST['username'] , $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $con->prepare("SELECT * FROM users WHERE (username=:username OR email=:email)");
    $stmt->execute([':username' => $username , ":email" => $username]);
    if($stmt->rowCount()){
        $stmt = $con->prepare("SELECT * FROM users WHERE (username=:username OR email=:email) AND activated = 1");
        $stmt->execute([':username' => $username , ":email" => $username]);

        if($stmt->rowCount()){            
            if(password_verify($password , $stmt->fetch()['password'])){
                echo "Hello " . $username;
            } else {
                die("The username or password is incorrect");
            }
        } else {
            die("Your account is not activated");
        }

    } else {
        die("The username or password is incorrect");
    }

} else {
    echo "Error (404) the page not found";
}
<?php

/**
 * username
 * email
 * password
 * password_confirm
 */

require_once "../inc/connection.php";

if(isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['password_confirm'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    // if(preg_match('/^[a-z0-9-_. ]*$/i', $username){
        if( (strlen($password) >= 8) && (strlen($password) <= 32) ){
            if($password === $password_confirm){
                if( filter_var($email, FILTER_VALIDATE_EMAIL) ){     
                    $stmt = $con->prepare("SELECT * FROM users WHERE username=?");
                    $stmt->execute([$username]);
                    if($stmt->rowCount()){
                        die("The username is already taken, please pick up another one");
                    } else {
                        $stmt = $con->prepare("SELECT * FROM users WHERE email=?");
                        $stmt->execute([$email]);
                        if($stmt->rowCount()){
                            die("The email is already taken, please pick up another one");
                        } else {
                            $stmt = $con->prepare("INSERT INTO users (username,password,email) VALUES (?,?,?)");
                            $stmt->execute([
                                $username, 
                                password_hash($password, PASSWORD_DEFAULT, ['cost' => 11]), 
                                $email]);
                            if($stmt->rowCount()){
                                echo "Thank you for registering, please go to activate your account from your email";
                            } else {
                                echo "failed to insert the data";
                            }  
                        }
                    }                 
                                                        
                } else {
                    echo "please Enter a vaild email";
                }  
            } else {
                echo "The password dosen't match";
            }        
        } else {
            echo "please Enter a vaild password";
        } 
    // } else {
    //     echo "please Enter a vaild username";
    // }
} else {
    echo "Invalid Data";
}

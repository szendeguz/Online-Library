<?php
//script to signup new users
//event listener for "Sign up" button on signup page
session_start();
include_once 'dbc.php';
include_once '../classes/models/loginsignupmodel.php';
include_once '../classes/controllers/signupprofilecontroller.php';
//checks for the singup button pressed
if(isset($_POST['signup'])){
    $con=Dbc::connect();
    //intializes variables from the form
    $username =$_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    //checks if the user exists
    $checkUser = Loginsignupmodel::checkLogin($con,$username,$password);
    //if the user does not exist and the two passwords match and all textboxes are filled then makes a new user 
    if($checkUser==false&&$password==$passwordRepeat&&($username!=""||$password!=""||$passwordRepeat!="")){
        $makeUser = Signupprofilecontroller::addNewUser($con,$username,$password);
        //if making new user is successfull then initializes the session variables
        if($makeUser){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userid'] = Loginsignupmodel::getId($con,$username);
            header('Location: ../home.php');
        }else{
            header('Location: ../signup.php?error=invaliduserorpassword');
        }
    }else{
        header('Location: ../signup.php?error=invaliduserorpassword');
    }  
}
<?php
//script for loging users and admins in to the page
//event listener for the login buttons on index and adminindex pages
session_start();
include_once 'dbc.php';
include_once '../classes/models/loginsignupmodel.php';
//checks if it's an user login
if(isset($_POST['login'])){
    $con=Dbc::connect();
    //intializes variables, that will be used as session variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    //checks if the username and password are correct
    $checkUser = Loginsignupmodel::checkLogin($con, $username, $password);
    if($checkUser){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userid'] = Loginsignupmodel::getId($con,$username);
        header('Location: ../home.php');
    }else{
        header('Location: ../index.php?error=invaliduserorpassword');
    }
//does the same on the admins table if it is an admin login
}else if(isset($_POST['adminlogin'])){
    $con=Dbc::connect();
    $adminname = $_POST['adminname'];
    $password = $_POST['adminpw'];

    $checkAdmin = Loginsignupmodel::checkAdminLogin($con, $adminname, $password);
    if($checkAdmin){
        $_SESSION['adminname'] = $adminname;
        $_SESSION['adminpw'] = $password;
        $_SESSION['adminid'] = Loginsignupmodel::getAdminId($con,$adminname);
        header('Location: ../adminhome.php');
    }else{
        header('Location: ../index.php?error=invaliduserorpassword');
    }
}
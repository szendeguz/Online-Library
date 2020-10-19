<?php
//script for updating username and password for admins and users aswell
//script for adding new admins to the databes from the admin's profile page
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/signupprofilecontroller.php';
include_once '../classes/models/loginsignupmodel.php';
//checks if it is user profile update
if(isset($_POST['updateprofile'])){
    $con=Dbc::connect();
    //saves variables from the form
    $currentUser = $_SESSION['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $userId = $_SESSION['userid'];
    $currUserId = Loginsignupmodel::getId($con,$username);
    //checks if the new username is vacant or not
    //checks if it is the same as the old one
    if($userId>0&&$userId!=$currUserId){
        header('Location: ../profile.php?error=smtherror');
    }else{
        //updeates password and username based on the filled textboxes
        $updateProfile = Signupprofilecontroller::Updateprofile($con,$username,$password,$passwordRepeat,$userId);
        if($updateProfile){
            if($username!=''){
                $_SESSION['username'] = $username;
            }
            if($password!=''||($password!=''&&empty($_POST['username']))){
                $_SESSION['password'] = $password;
            }
            header('Location: ../profile.php');
        }else{
            header('Location: ../profile.php?error=smtherror');
        }
    }
//same for admins but for the admins table
}else if(isset($_POST['updateadmin'])){
    $con=Dbc::connect();

    $currentAdmin = $_SESSION['adminname'];
    $adminname = $_POST['adminname'];
    $adminpw = $_POST['adminpw'];
    $adminpwRepeat = $_POST['adminpw-repeat'];
    $adminId = $_SESSION['adminid'];
    $currAdminId = Loginsignupmodel::getAdminId($con,$adminname);

    if($adminId>0&&$adminId!=$currAdminId){
        header('Location: ../adminprofile.php?error=smtherror');
    }else{
        $updateAdminProfile = Signupprofilecontroller::updateAdmin($con,$adminname,$adminpw,$adminpwRepeat,$adminId);
        if($updateAdminProfile){
            if($adminname!=''){
                $_SESSION['adminname'] = $adminname;
            }
            if($adminpw!=''){
                $_SESSION['adminpw'] = $adminpw;
            }
            header('Location: ../adminprofile.php');
        }else{
        header('Location: ../adminprofile.php?error=smtherror');
        }
    }
//checks if the button pressed is about adding a new admin
//same as before but we are inserting into the admins table, not updating an existing row
}else if(isset($_POST['addadmin'])){
    $con=Dbc::connect();

    $currentAdmin = $_SESSION['adminname'];
    $adminname = $_POST['newadmname'];
    $adminpw = $_POST['newadmpw'];
    $adminpwRepeat = $_POST['newadmpw-repeat'];
    $adminId = $_SESSION['adminid'];
    $currAdminId = Loginsignupmodel::getAdminId($con,$adminname);

    if($currAdminId>0&&$currAdminId!=$adminId){
        header('Location: ../adminprofile.php?error=smtherror');
    }else{
        if($adminpw==$adminpwRepeat){
            $newAdmin = Signupprofilecontroller::addNewAdmin($con,$adminname,$adminpw);
            header('Location: ../adminprofile.php?newadminadded');
        }else{
            header('Location: ../adminprofile.php?error=pwsdontmatch');
        }
    }
}
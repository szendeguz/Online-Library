<?php
include_once 'includes/dbc.php';
include_once 'classes/models/profilemodel.php';
//view class for profile page
class Profileview{
    //displays user profile info
    public static function displayProfile(){
        $con = Dbc::connect();
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $profileInfo = Profilemodel::getProfileInfo($con,$username,$password);

        if($profileInfo){
            echo '<p class="userinfo">Username: '.$username.'</p><br>
            <p class="userinfo">Password: '.$password.'</p>';
        }
    }
    //displays admin profile info
    public static function displayAdminInfo(){
        $con=Dbc::connect();
        $adminname = $_SESSION['adminname'];
        $password = $_SESSION['adminpw'];

        $adminInfo = Profilemodel::getAdminProfileInfo($con,$adminname,$password);

        if($adminInfo){
            echo '<p>Admin name: '.$adminname.'</p><br>
            <P>Password: '.$password.'</p>';
        }
    }
}
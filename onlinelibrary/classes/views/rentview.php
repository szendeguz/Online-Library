<?php
include_once 'includes/dbc.php';
include_once 'classes/models/rentmodel.php';
//view class for rents page
class Rentview {
    //displays the current users rents
    public static function displayRents(){
        $con = Dbc::connect();
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        
        $rentArr = Rentmodel::getRents($con,$userid);

        
        foreach($rentArr as $rentItems){
            echo '<tr>
            <td>'.$rentItems['title'].'</td>
            <td>'.$rentItems['author'].'</td>
            <td><button type="submit" class="btn btn-primary" id="removeitem" name="'.$rentItems['id'].'">Remove</button></td>
            </tr>';
        }
    }
    //displays all rents with users and book titles and authors for admins
    public static function displayAllrents(){
        $con = Dbc::connect();

        $allRents = Rentmodel::getAllrentedbooks($con);

        foreach($allRents as $rents){
            echo'
                <tr>
                    <td>'.$rents['title'].'</td>
                    <td>'.$rents['author'].'</td>
                    <td>'.$rents['name'].'</td>
                </tr>
            ';
        }
    }

}
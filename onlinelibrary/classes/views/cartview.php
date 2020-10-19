<?php
include_once 'includes/dbc.php';
include_once 'classes/models/cartmodel.php';
//view class for cart page
class Cartview {
    //displays the cart table for users
    public static function displayCart(){
        $con = Dbc::connect();
        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];

        $cartArr = Cartmodel::getBooksInCart($con,$userid);

        foreach($cartArr as $cartItem){
            echo '<tr>  
                        <input type="hidden" name="cartArr[]" value="'.$cartItem['id'].'">
                        <td>'.$cartItem['title'].'</td>
                        <td>'.$cartItem['author'].'</td>
                        <td><button type="submit" class="btn btn-primary" id="removeitem" name="'.$cartItem['id'].'">Remove</button></td>
                        </tr>';
        }
    }
    
}
<?php
//model class for cart page
class Cartmodel {
    //gets the users book from the cart table based on the user's user id
    public static function getBooksInCart($con,$userid){
        $sql = $con->prepare("SELECT books.title, books.author, books.id FROM books
        INNER JOIN carts ON carts.bookid = books.id
        WHERE carts.userid=:userid");

        $cartArr = array();

        $sql->bindParam(':userid',$userid);
        $sql->execute();
        
        while($row=$sql->fetch()){
            $cartArr[] = $row;
        }

        return $cartArr;
    }

}
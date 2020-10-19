<?php
//controller class for cart page
class Cartcontroller {
    //adds new books to cart on books page
    //if the book is already in the cart it will not add it
    public static function addBookToCart($con,$userid,$bookid){
        $checkbook = $con->prepare(
            "SELECT * FROM carts
            WHERE bookid=:bookid;"
        );

        $checkbook->bindParam(':bookid',$bookid);

        $checkbook->execute();
        if($checkbook->rowCount()>0){
            return false;
        }else{
            $query=$con->prepare(
                "INSERT INTO carts (userid, bookid)
                VALUES(:userid, :bookid);"
            );

            $query->bindParam(':userid', $userid);
            $query->bindParam(':bookid', $bookid);

            return $query->execute();
        }
    }
    //deletes everything from the current users cart
    //it is used when the user deletes everything from his cart or when he rents the books
    public static function emptyCart($con, $userid){
        $query=$con->prepare("
            DELETE FROM carts
            WHERE userid=:userid;
        ");

        $query->bindParam(':userid',$userid);

        return $query->execute();
    }
    //delete one item from the cart
    public static function emptyCartSelected($con, $bookid){
        $query = $con->prepare("
            DELETE FROM carts
            WHERE bookid=:id;
        ");

        $query->bindParam(':id',$bookid);

        return $query->execute();
    }

}
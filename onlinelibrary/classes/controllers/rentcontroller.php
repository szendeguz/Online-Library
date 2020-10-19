<?php
//controller class for rents page
class Rentcontroller{
    //rents the books in the users cart on cart page
    public static function rentBooksInCart($con,$userid){
        $query=$con->prepare(
            "INSERT INTO rents (bookid, userid)
            (SELECT carts.bookid, carts.userid FROM carts
            WHERE carts.userid=:userid);"
        );

        $query->bindParam(':userid',$userid);

        return $query->execute();
    }
    //deletes all rents from one user
    public static function delteRents($con, $userid){
        $query=$con->prepare("
            DELETE FROM rents
            WHERE userid=:userid;
        ");

        $query->bindParam(':userid',$userid);

        return $query->execute();
    }
    //deletes one rent from one user
    public static function deleteSingleRent($con, $bookid){
        $query = $con->prepare("
            DELETE FROM rents
            WHERE bookid=:id;
        ");

        $query->bindParam(':id',$bookid);

        return $query->execute();
    }

}
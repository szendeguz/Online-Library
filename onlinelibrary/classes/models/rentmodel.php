<?php
//model class for rents
class Rentmodel {
    //gets one users rent from the rent table based on the user's user id
    public static function getRents($con, $userid){
        $sql = $con->prepare("
            SELECT books.title, books.author, books.id FROM books
            INNER JOIN rents ON rents.bookid = books.id
            WHERE rents.userid=:userid
        ");

        $rentArr = array();

        $sql->bindParam(':userid',$userid);
        $sql->execute();

        while($row=$sql->fetch()){
            $rentArr[] = $row;
        }

        return $rentArr;
    }
    //gets all user rents with usernames, book titles and authors from rents table
    public static function getAllRentedBooks($con){
        $sql = $con->prepare("
            SELECT books.title, books.author, users.name FROM books
            INNER JOIN rents ON rents.bookid = books.id
            INNER JOIN users ON rents.userid = users.id
            ORDER BY rents.userid ASC;
        ");

        $rentArr = array();

        $sql->execute();

        while($row=$sql->fetch()){
            $rentArr[] = $row;
        }

        return $rentArr;
    }
    //gets the book ids of books rented by the user from books table
    public static function getRentedBookIds($con, $userid){
        $query = $con->prepare("
            SELECT bookid FROM rents
            WHERE userid=:userid;
        ");

        $query->bindParam(':userid',$userid);

        $bookids = array();

        $query->execute();

        while($row=$query->fetch()){
            $bookids[] = $row;
        }

        return $bookids;
    }
}
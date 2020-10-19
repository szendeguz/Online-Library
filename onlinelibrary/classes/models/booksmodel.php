<?php
//model class for books
class Booksmodel {
    //gets all books from the database
    public static function getBooks($con){
        $sql="
            SELECT books.title, books.author, books.rent_status, books.id FROM books;
        ";

        $booksArr = array();

        $con = Dbc::connect();
        $stmt =$con->query($sql);
        
        while($row=$stmt->fetch()){
            $booksArr[] = $row;
        }

        return $booksArr;
    }
}
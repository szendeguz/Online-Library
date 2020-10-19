<?php
include_once '../classes/models/booksmodel.php';
include_once 'dbc.php';
//controller class for books page
class Bookscontroller{
    //adding new books to database for admins
    public static function addNewBooksToDb($con,$title,$author){
        $query=$con->prepare(
            "INSERT INTO books(title, author, rent_status)
            VALUES(:title, :author, 0)"
        );

        $query->bindParam(':title',$title);
        $query->bindParam(':author',$author);

        return $query->execute();
    }
    //dete books from database for admins
    public static function deleteBook(){
        $con = Dbc::connect();
        $booksArr = Booksmodel::getBooks($con);

        foreach($booksArr as $book){
            if($book['id']==isset($_POST[$book['id']])){
                $query = $con->prepare("
                    DELETE FROM books
                    WHERE id=:id;
                ");

                $query->bindParam(':id',$book['id']);

                return $query->execute();;
            }
        }
    }
    //sets the book status to rented in database, so if a book is rented by an user
    //others can't rent it
    public static function updateBookStatus($con,$bookid){
        $query=$con->prepare("
            UPDATE books SET books.rent_status=1
            WHERE books.id=:bookid;
        ");

        $query->bindParam(':bookid',$bookid);
        return $query->execute();
    }
    //remove the rent status from a book, so it will become rentable again
    public static function removeBookStatus($con, $bookid){
        $query=$con->prepare("
            UPDATE books SET books.rent_status=0
            WHERE books.id=:bookid;
        ");

        $query->bindParam(':bookid',$bookid);
        return $query->execute();
    }
}
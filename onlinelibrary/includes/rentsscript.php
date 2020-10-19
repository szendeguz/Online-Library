<?php
//script for rent books in the cart and to put all rents back from the rents page
//event listener for "Rent" button in cart page
//event listener for "Put all books back" button in rents page
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/rentcontroller.php';
include_once '../classes/controllers/cartcontroller.php';
include_once '../classes/controllers/bookscontroller.php';
include_once '../classes/models/rentmodel.php';

$con = Dbc::connect();
$userid = $_SESSION['userid'];

//checks if it is a renting event
if(isset($_POST['rentbooks'])){ 
    //first it must rents the books from the cart, inserts them to rents table
    $rentBooks = Rentcontroller::rentBooksInCart($con, $userid);
    //second it empties the user's cart based on user id
    $emptyCart = Cartcontroller::emptyCart($con,$userid);
    //gets all the rented books id's
    $rentIds = Rentmodel::getRentedBookIds($con, $userid);
    foreach($rentIds as $rented){
      //updates rented books rent_status to 1 in books table  
      $updateStatus = Bookscontroller::updateBookStatus($con,(int)$rented['bookid']);
    }

    header('Location: ../rents.php');
    //checks if the books are being put back to rentable from a rent
}else if(isset($_POST['removeAll'])){
    //gets all the rented books id's
    $rentIds = Rentmodel::getRentedBookIds($con, $userid);
    foreach($rentIds as $rented){
         //updates rented books rent_status to 0 in books table
        $updateStatus = Bookscontroller::removeBookStatus($con,(int)$rented['bookid']);
    }
    //deletes the user's rents
    $deleteRents = Rentcontroller::delteRents($con,$userid);
    
    header('Location: ../rents.php');
}
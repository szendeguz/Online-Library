<?php
//script for removing rents of an user
//event listener for Remove buttons on rents page
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/rentcontroller.php';
include_once '../classes/controllers/bookscontroller.php';
include_once '../classes/models/booksmodel.php';

$con = Dbc::connect();
$booksArr = Booksmodel::getBooks($con);

foreach($booksArr as $book){
    //iterating through all books to check if it is the one that has been pressed
    if($book['id']==isset($_POST[$book['id']])){
        //this static function deletes the rent from rents table
        $delete = Rentcontroller::deleteSingleRent($con,$book['id']);
        //this static function sets the delete books rent_status to 0 in the books table
        $removeStatus = Bookscontroller::removeBookStatus($con,$book['id']);
    }
}

header('Location: ../rents.php');


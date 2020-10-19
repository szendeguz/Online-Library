<?php
//script for adding books to database
//event listener for the "Add Book" button on adminbooks page
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/bookscontroller.php';

if(isset($_POST['addbook'])){
    $con=Dbc::connect();
    $title=$_POST['booktitle'];
    $author=$_POST['bookauthor'];

    $addNewBook = Bookscontroller::addNewBooksToDb($con,$title,$author);

    header('Location: ../adminbooks.php');
}
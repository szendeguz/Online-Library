<?php
//script for deleting books from the database
//event listener for the Remove buttons on adminbooks page
session_start();
include_once '../classes/controllers/bookscontroller.php';

$deleteBook = Bookscontroller::deleteBook();

header('Location: ../adminbooks.php');
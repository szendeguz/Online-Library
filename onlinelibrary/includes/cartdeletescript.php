<?php
//script for deleting itmes from cart on carts page
//event listener for the remove buttons
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/cartcontroller.php';
include_once '../classes/models/booksmodel.php';

$con = Dbc::connect();
$booksArr = Booksmodel::getBooks($con);

foreach($booksArr as $book){
    if($book['id']==isset($_POST[$book['id']])){
        $delete = Cartcontroller::emptyCartSelected($con,$book['id']);
    }
}

header('Location: ../cart.php');

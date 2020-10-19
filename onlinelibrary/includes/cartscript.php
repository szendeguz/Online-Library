<?php
//script from adding books to cart from books page to cart page
//event listener for "Add to cart" buttons on books page
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/cartcontroller.php';

if(isset($_POST['addtocart'])){
    if(isset($_POST['bookArr'])){
        $con = Dbc::connect();
        $books = $_POST['bookArr'];
        $userid = $_SESSION['userid'];

        foreach($books as $name){
            $cart = Cartcontroller::addBookToCart($con,$userid,$name);
        }

        header('Location:../cart.php');
    }
}
<?php
//logout script
//event listener for the logout menu item
//starts a session in order to destroy it later
session_start();
include_once 'dbc.php';
include_once '../classes/controllers/cartcontroller.php';

$con = Dbc::connect();
$userid = $_SESSION['userid'];
//deletes the user's cart before it empties the session variable
$deleteCart = Cartcontroller::emptyCart($con,$userid);
//empties the session variable
session_destroy();
$_SESSION= [];

header("Location: ../index.php");
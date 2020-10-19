<!--HTML and PHP for rents page-->
<?php
    session_start();
    include_once 'classes/views/rentview.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
    <!--FŐOLDAL-->
    <div id="home">
        <!--Navbar-->
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <a class="navbar-brand" href="home.php">ONLINE LIBRARY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rents.php">My rents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Shopping cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logoutscript.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
<!-- Table  -->
<div class="table-responsive">
<form action="includes/rentdeletescript.php" method="post">
<table class="table table-bordered table-hover booktable">
    <!-- Table head -->
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Give back</th>
      </tr>
    </thead>
    <!-- Table head -->
    <!-- Table body -->
    <tbody>
    <?php
        $displayRents = Rentview::displayRents();
    ?>
    </tbody>
    <!-- Table body -->
    </form>
    </table>
  <form action="includes/rentsscript.php" method="post">
  <button type="submit" class="btn btn-primary" id="addtocart" name="removeAll">Put all books back</button>
</form>
</div>
</form>
  <!-- Table  -->
</div>
</body>
</html>

<!--HTML and PHP for adminrents page-->
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
                        <a class="nav-link" href="adminhome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminbooks.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminrents.php">Rents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminprofile.php">Profile</a>
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
<table class="table table-bordered table-hover booktable">
    <!-- Table head -->
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Username</th>
      </tr>
    </thead>
    <!-- Table head -->
    <!-- Table body -->
    <tbody>
    <?php
        $displayRents = Rentview::displayAllrents();
    ?>
    </tbody>
    <!-- Table body -->
  </table>
</div>
  <!-- Table  -->
</div>
</body>
</html>

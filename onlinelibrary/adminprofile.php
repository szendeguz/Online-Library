<!--HTML and PHP for adminprofile page-->
<?php
    session_start();
    include_once 'classes/views/profileview.php';
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
    <!-- Admin profile div-->
        <div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
            <div class="infoDiv">
            <?php
                $displayProfile = Profileview::displayAdminInfo();
            ?>
            <button type="button" id="updateBtn" class="btn btn-primary">Update profile</button>
            </div>
    <!-- Admin profile div-->
    <!-- Update admin profile div-->
            <div class="updateDiv" id="updateDiv">    
            <form action="includes/updateprofilescript.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="adminname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="adminpw" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password Repeat</label>
                        <input type="password" name="adminpw-repeat" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name="updateadmin">Update</button>
                </form>
            </div>
            <br>
    <!-- Add new admin div-->
            <button type="button" id="addNewAdmin" class="btn btn-primary">Add new admin</button>
                <div class="updateAdminDiv" id="updateAdminDiv">
            <form action="includes/updateprofilescript.php" method="post">
                <div class="form-group">
                                <label id="blacktxt">Admin name</label>
                                <input type="text" name="newadmname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label id="blacktxt">Password</label>
                                <input type="password" name="newadmpw" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label id="blacktxt">Password Repeat</label>
                                <input type="password" name="newadmpw-repeat" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="addadmin">Add Admin</button>
                </form>
            </div>
                </div>
        </div>
    </div>
    </div> 
    <script src="js/adminprofile.js"></script>
</body>
</html>

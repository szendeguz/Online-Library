<!--HTML for adminindex page-->
<html>
<head>
    <meta charset="utf-8">
    <title>Online Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
                <h2>Login Here </h2>
                <form action="includes/loginscript.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="adminname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="adminpw" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="adminlogin">Login</button><br>
                    <a href="index.php" class="adminlink">User login</a>
                </form> 
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<!--HTML for singup page-->
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
                <h2>Signup Here </h2>
                <form action="includes/signupscript.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password-repeat" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signup">Signup</button>
                    <a href="index.php" class="signupBtn"><button type="button" class="btn btn-primary" name="">Login</button></a>
                </form> 
            </div>
        </div>
    </div>
    </div>
</body>
</html>
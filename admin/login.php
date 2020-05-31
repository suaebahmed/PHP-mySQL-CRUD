<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page.php</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .manu{
            position: absolute;
            top: 10px;
            right: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="manu">
        <a href="/php"><div class="btn btn-primary">home</div></a>
    </div>
    <h1>Login page</h1>
    <div class="row">
        <div class="col-xs-6 ml-auto">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        if(empty($email)){
            echo "please enter your email";
        }else{
            echo "your email is ",$email,"<br>";
            echo "your password is ",$password;
        }
    }
?>

</div>
</body>
</html>
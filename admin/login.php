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

<?php
    $table = 'users';
    require_once 'db.php';
    session_start();

    if(isset($_SESSION['user_login'])){
        header('location: index.php');
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $query = "SELECT * FROM $table WHERE email = '$email'";
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)> 0){
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == md5($password)){
                $_SESSION['login_success'] = "logged in successfully";
                $_SESSION['user_login'] = $email;
                header('location: index.php');
            }else{
                $password_err = "password is not correct";
            }
        }else{
            $userName_err = "email is not found";
        }
    }
?>


<div class="container">
    <div class="manu">
        <a href="index.php"><div class="btn btn-primary">home</div></a>
    </div>
    <h1>Login page</h1>
    <div class="row">
        <div class="col-xs-6 ml-auto">

        <div class="msg" style="margin: 10px 0px">
            <?php
                if(isset($userName_err)){
                    echo "<div class='alert alert-warning'>".$userName_err."</div>";
                }
                if(isset($password_err)){
                    echo "<div class='alert alert-warning'>".$password_err."</div>";
                }
                if(isset($_SESSION['logout_success'])){
                    echo "<div class='alert alert-success'>".$_SESSION['logout_success']."</div>";
                    unset($_SESSION['logout_success']);
                }
            ?>
        </div>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="login" class="btn btn-primary">
                    <a href="register.php">register?</a>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
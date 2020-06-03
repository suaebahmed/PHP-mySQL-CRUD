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
        .err-msg > p{
            margin: 5px;
            color: #af18e6;
        }
    </style>
</head>
<body>
<?php
    $table = 'users';
    require_once 'db.php';
    session_start();

    $input_error = Array();
    // if(isset($input_error)){ --- always true for array;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if(isset($_FILES['photo']['name'])){
            $photoName = $_FILES['photo']['name'];
        }
        //$username 
        //$confirm_password

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        if(empty($email)){
            $input_error['email'] = "please enter your email";
        }
        if(empty($password)){
            $input_error['password'] = "please enter your password";
        }
        if(empty($photoName)){
            $input_error['photo'] = "please enter your photo";
        }
        if(count($input_error) == 0){
            $query = "SELECT * FROM $table WHERE email = '$email'";
            $result = mysqli_query($link,$query);
            if($result->num_rows == 0){
//------------- hash password genarate  ---
                $password = md5($password);
//---------- check other validation if YOU want --- 1. strlen() 2.password equal 3.username unique;
                $query = "INSERT INTO $table(email,password,photo,status) VALUES('$email','$password','$photoName','inactive')";
                $result = mysqli_query($link,$query);
                if($result){
                    $_SESSION['user_register_msg'] = 'successfully user registered';
                    move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photoName);
                    header("location: index.php");
                }else{
                    $_SESSION['user_register_msg'] = 'Error user registered';
                }
            }else{
                $input_error['email-exist'] = "Your email already exists";
            }
        }
    }
?>



<div class="container">
    <div class="manu">
        <a href="index.php"><div class="btn btn-primary">home</div></a>
    </div>
    <h1>Register page</h1>
    <div class="row">
        <div class="col-xs-6 ml-auto">
                <!---- msg ---->
            <div class="msg" style="margin: 10px 0px">
            <?php
                if(isset($_SESSION['user_register_msg'])){
                    echo "<div class='alert alert-success'>".$_SESSION['user_register_msg']."</div>";
                    unset($_SESSION['user_register_msg']);
                }
            ?>
            </div>

            <form action="register.php" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="email">
                    <div class="err-msg">
                        <p>
                            <?php if(isset($input_error['email'])) echo $input_error['email']; ?>
                            <?php if(isset($input_error['email-exist'])) echo $input_error['email-exist']; ?>
                        </p>
                    </div>

                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="password">
                    <div class="err-msg">
                        <p>
                            <?php if(isset($input_error['password'])) echo $input_error['password']; ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                    <div class="err-msg">
                        <p>
                            <?php if(isset($input_error['photo'])) echo $input_error['photo']; ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="register" class="btn btn-primary">
                    <a href="login.php">login?</a>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>core php mysql </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .manu{
            position: absolute;
            top: 15px;
            right: 50px;
        }
    </style>
    <?php
        session_start();
        //it means wherever we create the session it will be alive session
        // echo $_SESSION['user_login'];

        if(!isset($_SESSION['user_login'])){
            header('location: login.php');
        }
    ?>
</head>
<body>
<div class="container">
    <div class="manu">
        <a href="login.php"><div class="btn btn-primary">login admin</div></a>
        <a href="logout.php"><div class="btn btn-warning">logout</div></a>
    </div>

    <div class="header-text">
        <h1>Students management system!</h1>
    </div>

    <div class="row">
    <div class="col-xs-6">
            <!----success register redirect message ---->
            <div class="msg" style="margin: 10px 0px">
                <?php
                    if(isset($_SESSION['user_register_success'])){
                        echo "<div class='alert alert-success'>".$_SESSION['user_register_success']."</div>";
                        unset($_SESSION['user_register_success']);
                    }
                    if(isset($_SESSION['login_success'])){
                        echo "<div class='alert alert-success'>".$_SESSION['login_success']."</div>";
                        unset($_SESSION['login_success']);
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=deshbord" class="list-group-item active">Deshbord</a>
                    <a href="index.php?page=add_students" class="list-group-item ">Add student</a>
                    <a href="index.php?page=all_students" class="list-group-item ">All students</a>
                    <a href="index.php?page=all_users" class="list-group-item ">All users</a>
                </div>
            </div>
            <div class="col-sm-3" style="border: 1px solid; height: 165px; margin-left: 140px">

            </div>
            <div class="col-sm-3" style="border: 1px solid; height: 165px; margin-left: 20px">

            </div>
            <!---- table  ---->
      <?php  
            if(isset($_GET['page'])){
                if($_GET['page'] == "deshbord"){
                    require_once 'deshbord.php';
                }
                if($_GET['page'] == "add_students"){
                    require_once 'add_student.php';
                }
                if($_GET['page'] == "all_students"){
                    require_once 'all_students.php';
                }
                if($_GET['page']== "all_users"){
                    require_once 'all_users.php';
                }
            }else{
                require_once 'deshbord.php';
            }
      ?>
            
    </div>
</div>

</body>
</html>

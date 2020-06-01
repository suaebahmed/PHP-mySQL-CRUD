<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>


<?php
    $database = "crud";
    $user_name = "root";
    $password = "";
    $connect = mysqli_connect("localhost",$user_name,$password,$database);
    
    if($connect == false){
        die("Error: could not connect".mysqli_connect_error());
    }else{
        echo "database connected";
    }

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $location = $_POST['location'];
        $query = "INSERT INTO php(name,location) 
                  VALUES('$name','$location'),('$name.1','$location.1')";

        if(mysqli_query($connect,$query)){
            echo "data insert successfully";
        }else{
            echo "data not inserted";
        }
        mysqli_close($connect);
    }
?>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-xs-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="location">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

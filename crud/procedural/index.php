<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn php</title>
</head>
<body>


<?php
    $database = "crud";
    $user_name = "root";
    $password = "";

    $link = mysqli_connect("localhost",$user_name,$password,$database);
    
    if(mysqli_connect_errno()){
        die("Error: could not connect".mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $location = $_POST['location'];
        $query = "INSERT INTO php(name,location) 
                  VALUES('$name','$location'),('$name.1','$location.1')";
            if(mysqli_query($link,$query)){
                echo "data insert successfully";
            }else{
                echo "data not inserted";
            }
        }

        $sql = "SELECT * FROM php WHERE 1";
        $result = mysqli_query($link,$sql);

        while($row = mysqli_fetch_object($result)){
            echo "<pre>";
                print_r($row);
            echo "</pre>";
        };
        // free result
        mysqli_free_result($result); // $result->free();
        mysqli_close($link);

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

<?php

$database = "crud_oparetion";
$user_name = "root";
$password = "";
$mysqli = new mysqli("localhost",$user_name,$password,$database) or die(mysqli_error($mysqli));

    if(isset($_POST['submit'])){ // string and array;
        $name = $_POST['name'];
        $location = $_POST['location'];
        $mysqli->query("INSERT INTO datas(name,location) VALUES('$name','$location')") or die($mysqli->error);
        $mysqli->close();
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM datas WHERE id = $id ") or die($mysqli->error);
        $mysqli->close();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['change'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $location = $_POST['location'];

            $sql = "UPDATE datas SET name ='$name',location = '$location' WHERE id = $id";
            $mysqli->query($sql) or die($mysqli->error);
            $mysqli->close();// 0 parameter
        }
    }

?>



<div class="col-xs-12">
<?php 
    require_once 'db.php';

    if(isset($_POST["add_student"])){
        

        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $class = $_POST['class'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];

        $photoName = $_FILES['photo']['name'];
        $photo = $_FILES['photo']['tmp_name'];

        $splitArr = explode('.',$photoName);
        $extension = end($splitArr);
        $photoName = $roll.'.'.$extension;

        $sql = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `contact`, `photo`) VALUES ('$name',$roll,'$class','$city','$contact','$photoName')";
        $result = mysqli_query($link,$sql);
        if($result){
            move_uploaded_file($photo,'student_img/'.$photoName);
            $insert_success_msg = "data insert successfully";
        }else{
            $insert_err_msg = "Error not inserted";
        }
    }

?>
</div>
<div class="col-xs-12">
</div>
<div class="col-xs-6">
        <div class="msg" style="margin: 10px 0px">
            <?php
                if(isset($insert_success_msg)){
                    echo "<div class='alert alert-success'>".$insert_success_msg."</div>";
                }
                if(isset($insert_err_msg)){
                    echo "<div class='alert alert-danger'>".$insert_err_msg."</div>";
                }
            ?>
        </div>
        <p>Add new student</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="name" required class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <input type="text" name="roll" required class="form-control" placeholder="roll">
            </div>
            <div class="form-group">
                <input type="text" name="class" required class="form-control" placeholder="class">
            </div>
            <div class="form-group">
                <input type="text" name="city" required class="form-control" placeholder="city">
            </div>
            <div class="form-group">
                <input type="text" name="contact" required class="form-control" placeholder="contact">
            </div>
            <div class="form-group">
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="add_student" value="add student" class="btn btn-primary">
            </div>
        </form>
</div>

<div class="col-xs-4">
<h1>Your profile</h1>
    <div class="table-responsive">
        <table table-border="1" class ="table table-bordered">
                <?php  
                    require_once 'db.php';
                    $userTable = 'users';
                    $email = $_SESSION['user_login'];

                    $sql = "SELECT * FROM $userTable WHERE email = '$email'";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td>Id</td>
                    <td><?php echo $row['id'] ?>id</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $row['status'] ?></td>
                </tr>
        </table>
        <a href="edit_student.php?id=<?php //echo $row['id'] ?>" class="btn btn-primary">edit</a>
    </div>
</div>
<div class="col-xs-4" style="padding: 72px 50px">
    <img width="100px" height="100px" src="<?php echo 'images/'.$row['photo'] ?>" alt="">
    <form action="" method="post">
        <div class="form-group">
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="add_student" value="add student" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
 }
?>

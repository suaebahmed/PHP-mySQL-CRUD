<div class="col-xs-10">
<h1>All Users</h1>
    <div class="table-responsive">
        <table table-border="1" class ="table table-hover table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>Email</th>
                <th>Photo</th>
                <th>status</th>
            </thead>
            <tbody>
                <?php  
                    require_once 'db.php';
                    $userTable = 'users';

                    $sql = "SELECT * FROM $userTable WHERE 1";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <img width="50px" height="50px" src="<?php echo 'images/'.$row['photo'] ?>" alt="">
                    </td>
                    <td><?php echo $row['status'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

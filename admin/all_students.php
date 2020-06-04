<div class="col-xs-10">
<h1>All students</h1>
    <div class="table-responsive">
        <table table-border="1" class ="table table-hover table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>class</th>
                <th>City</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php  
                    require_once 'db.php';
                    $studentTable = 'student_info';

                    $sql = "SELECT * FROM $studentTable WHERE 1";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['roll'] ?></td>
                    <td><?php echo $row['class'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td>
                        <img width="50px" height="50px" src="<?php echo 'student_img/'.$row['photo'] ?>" alt="">
                    </td>
                    <td>
                        <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">edit</a>
                        <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

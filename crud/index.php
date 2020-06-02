<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn crud</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
<!-------------------  important talk   ----------------->
<!-- PDO and OOP way-->

<?php  include 'process.php' ?>
<?php 
    $mysqli = new mysqli("localhost","root","","crud_oparetion") or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM datas WHERE 1");
    // pre_r($result);  // ---------      for debug
    // pre_r($result->fetch_assoc());
    function pre_r($arg){
        echo "<pre>";
            print_r($arg);
        echo "</pre>";
    }
?>
<div style="margin-top: 20px"></div>
<div class="container">
<div class="row">
    <!-- notification msg -->
    <div class="col-xs-6 justify-content-center">
        <?php 
            if(isset($_SESSION['insert_msg'])){
                echo "<div class='alert alert-success'>".$_SESSION['insert_msg']."</div>";
                // session_unset(); // doesn't work
            }
            if(isset($_SESSION['update_msg'])){
                echo "<div class='alert alert-success'>".$_SESSION['update_msg']."</div>";
            }
            if(isset($_SESSION['delete_msg'])){
                echo "<div class='alert alert-danger'>".$_SESSION['delete_msg']."</div>";
            }
        ?>
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=$result->fetch_assoc()) :?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['location'] ?></td>
                        <td>
                        
                            <!-- <a class="btn btn-primary" href="index.php?edit=<?php echo $row["id"] ?>" onclick="clickEdit(<?php echo $row['id'] ?>)">edit</a> -->
                            <a class="btn btn-primary"  href="edit.php?edit=<?php echo $row["id"] ?>">edit</a>
                            <a class="btn btn-danger" href="index.php?delete=<?php echo $row["id"] ?>">delete</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-xs-6" id="column">
            <!-- action: when submit form to load this index page -->
            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="location">
                </div>
                <div class="form-group">
                    <input type="submit" name="save" value="save" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>

    <script>
        function clickEdit(id){

            var column = document.getElementById('column');
            column.innerHTML = ''
            column.innerHTML = `

            <?php
            
            $edit = $mysqli->query("SELECT * FROM datas WHERE 1");
            $x = $edit->fetch_assoc();

            print_r($x)
            ?>
  
            <form action="" method="POST">
                <div class="form-group" hidden>
                        <input type="text" name="id" value=${id} class="form-control" placeholder="id">
                    </div>
                <div class="form-group">
                    <input type="text" name="name" value="" class="form-control" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="location">
                </div>
                <div class="form-group">
                    <input type="submit" name="change" value="change" class="btn btn-warning">
                    <a class="btn btn-primary" href="index.php">cancel</a>
                </div>
            </form>
            `
        }
    </script>
</body>
</html>

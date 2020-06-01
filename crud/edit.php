<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<?php  include 'process.php' ?>
<?php 

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    // echo $id;

    $edit = $mysqli->query("SELECT * FROM datas WHERE id = $id ");
    $x = $edit->fetch_assoc();

}

?>

<div class="container mt-5">
    <h1>Edit page.</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-xs-6">
            <form action="index.php" method="POST">
                <div class="form-group" hidden>
                        <input type="text" name="id" value="<?php echo $id ?>" class="form-control" placeholder="id">
                    </div>
                <div class="form-group">
                    <input type="text" name="name" value="<?php echo $x['name'] ?>" class="form-control" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $x['location'] ?>" name="location" class="form-control" placeholder="location">
                </div>
                <div class="form-group">
                    <input type="submit" name="change" value="change" class="btn btn-warning">
                    <a class="btn btn-primary" href="index.php">cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


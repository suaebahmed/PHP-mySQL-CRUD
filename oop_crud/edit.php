<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<div style="margin: 20px"></div>
<div class="container">

    <?php require_once 'process.php' ?>
    <?php 

    if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $result = $obj->getOnePost($id);
        $x = $result->fetch_assoc();

    }

    ?>
    <div style="margin: 20px"></div>

    <div class="row justify-content-center mt-5">
        <div class="col-xs-6">
            <form action="index.php" method="POST">
                <div class="form-group" hidden>
                        <input type="text" name="id" value="<?php echo $id ?>" class="form-control" placeholder="id">
                    </div>
                <div class="form-group">
                    <input type="text" name="title" value="<?php echo $x['title'] ?>" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $x['body'] ?>" name="body" class="form-control" placeholder="body">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $x['author'] ?>" name="author" class="form-control" placeholder="author">
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


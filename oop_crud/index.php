<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=`1.0`">
    <title>php oop crud</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<div style="margin: 20px"></div>
<div class="container">

    <?php require_once 'process.php' ?>

    <div style="margin: 20px"></div>
    <div class="row justify-content-center mt-5">
        <div class="col-xs-6" id="column">

            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <input type="text" name="body" class="form-control" placeholder="body">
                </div>
                <div class="form-group">
                    <input type="text" name="author" class="form-control" placeholder="author">
                </div>
                <div class="form-group">
                    <input type="submit" name="save" value="save" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>


</body>
</html>
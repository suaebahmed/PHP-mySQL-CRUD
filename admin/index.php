<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>core php mysql </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .manu{
            position: absolute;
            top: 10px;
            right: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="manu">
        <a href="login.php"><div class="btn btn-primary">login admin</div></a>
        <a href="logout.php"><div class="btn btn-warning">logout</div></a>
    </div>

    <div class="header-text">
        <h1>Hello php developer!</h1>
    </div>

    <div class="row">
        <div class="col-xs-6 ml-auto">
            <form action="" method="get">
                <div class="form-group">
                    <input type="text" name="className" class="form-control" placeholder="student class name">
                </div>
                <div class="form-group">
                    <input type="text" name="rollNo" class="form-control" placeholder="student roll no.">
                </div>
                <div class="form-group">
                    <input type="submit" value="search" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

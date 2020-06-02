
<?php

    $table = 'blog';

    header('content-type','application/json');
    $requst = $_SERVER['REQUEST_METHOD'];

    switch ($requst) {
        case 'GET':
            getMethod();
        break;
        case 'POST':
            postMethod();
            break;
        case 'PUT':
            updateMethod();
            break;
        case 'DELETE':
            deleteMethod();
            break;
        default:
            echo '{Error: "Not Found."}';
            break;
    }

    function getMethod(){
            require_once 'db.php';
            global $table;

            $query = "SELECT * FROM $table WHERE 1";
            $result = $link->query($query);

            // $row['title'];
            // $row['body'];
            // $row['author']

            while ($row = $result->fetch_assoc()) {
                echo "<pre>";
                print_r($row);
                echo "<pre>";
            }
            $link->close();

    }
    function postMethod(){

        require_once 'db.php';
        global $table;

        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $query = "INSERT INTO $table(title,body,author) VALUES('$title','$body','$author')";
        $link->query($query);
        $link->close();

    }
    function updateMethod(){
        require_once 'db.php';
        global $table;

        // there are used PUT request but we hold data by POST super grobal variable
        $id = $_POST['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $query = "UPDATE $table SET title='$title',body='$body',author='$author' WHERE id = $id";
        $link->query($query);
        $link->close();

        echo "{'msg': 'successfully updated this following id is' }";

    }
    function deleteMethod(){
        require_once 'db.php';
        global $table;

        $id = $_GET['id'];

        $query = "DELETE FROM $table WHERE id = $id";
        $link->query($query);
        $link->close();

        echo "{'id': '$id'}";
    }

?>
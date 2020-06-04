

<?php
$table = 'blog';
header('content-type: application/json');
$requst = $_SERVER['REQUEST_METHOD'];

switch ($requst) {
    case 'GET':
        getMethod();
    break;
    case 'POST':
        $data = json_decode(file_get_contents('db.php',true));
        postMethod($data);
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

        // while ($row = $result->fetch_assoc()) {
        //     print_r(json_encode($row));
        // }

        // this string is json formated
        echo '{"msg": "successfully  we get the data"}';
        $link->close();

}
function postMethod($data){

    require_once 'db.php';
    global $table;

    echo $data;
    //------------  we should data pass by  ------------
    // $title = $_POST['title'];
    // $body = $_POST['body'];
    // $author = $_POST['author'];

    $query = "INSERT INTO $table(title,body,author) VALUES('$title','$body','$author')";
    $result = $link->query($query);
    if($result){
        echo '{"msg": "successfully  data inserted"}';
    }else{
        echo '{"msg": "data not inserted inserted"}';
    }
    $link->close();

    // error produce by browser and postman look ugly this string is json formated
    // echo "{'msg': 'successfully   data inserted'}";
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

    echo '{"msg": "successfully updated"}';

}
function deleteMethod(){
    require_once 'db.php';
    global $table;

    $id = $_GET['id'];

    $query = "DELETE FROM $table WHERE id = $id";
    $link->query($query);
    $link->close();

    echo '{"msg": "delete successfull"}';
}

?>

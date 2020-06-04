

<?php
$table = 'blog';
header('content-type: application/json');
$requst = $_SERVER['REQUEST_METHOD'];

switch ($requst) {
    case 'GET':
        getMethod();
    break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input',true));
        postMethod($data);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input',true));
        updateMethod($data);
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

        if( $result->num_rows > 0){

            $posts = array();
            while ($row = $result->fetch_assoc()) {
                $posts["result"][] = $row;
            }
            echo json_encode($posts);
        }else{
            // this string is json formated
            echo '{"msg": "No data found"}';
        }
        $link->close();

}
function postMethod($data){

    require_once 'db.php';
    global $table;

    $title = $data->title;
    $body = $data->body;
    $author = $data->author;

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
function updateMethod($data){
    require_once 'db.php';
    global $table;

    $id = $data->id;
    $title = $data->title;
    $body = $data->body;
    $author = $data->author;

    // there are used PUT request but we hold data by POST super grobal variable
    // $id = $_POST['id'];
    // $title = $_POST['title'];
    // $body = $_POST['body'];
    // $author = $_POST['author'];

    $query = "UPDATE $table SET title='$title',body='$body',author='$author' WHERE id = $id";
    $result=$link->query($query);
    if($result){
        echo '{"msg": "successfully updated"}';
    }else{
        echo '{"msg": "data not updated"}';
    }
    $link->close();
}
function deleteMethod(){
    require_once 'db.php';
    global $table;

    $id = $_GET['id'];

    $query = "DELETE FROM $table WHERE id = $id";
    $result=$link->query($query);
    if($result){
        echo '{"msg": "delete successfull"}';
    }else{
        echo '{"msg": "no deleted data"}';
    }
    $link->close();
}

?>

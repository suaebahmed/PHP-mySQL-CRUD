<?php

class crud{
    public $mysqli;
    public $table = 'Blog_opp';

    public function __construct(){
        
        $this->mysqli  = new mysqli('localhost','root','','crud');
        if($this->mysqli->connect_error){
            die('Error found '.$mysqli->connect_error);
        };
    }
    public function getAllPost(){

        $query = "SELECT * FROM $this->table WHERE 1";
        $result = $this->mysqli->query($query);

        while($row=$result->fetch_assoc()){
            echo "
                <div class='card'>
                    <h1>".$row['title']."</h1>
                    <p>".$row['body']."</p>
                    <h6 class='text-mute'>".$row['author']."</h6>
                    <a class='btn btn-primary' href='edit.php?edit=".$row['id']."'>edit</a>
                    <a class='btn btn-danger' href='index.php?delete=".$row['id']."'>delete</a>    
                </div>
            ";
        }
//----- only there because getAllPost method is called last -----
        $this->mysqli->close();
    
    }
    public function createPost(){
        //----- local variable ----
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $query = "INSERT INTO $this->table(title,body,author) VALUES('$title','$body','$author')";
        $this->mysqli->query($query);
    }
    public function deletePost($id){

        $query = "DELETE FROM $this->table WHERE id = $id";
        $this->mysqli->query($query);
//----- not executable because the next method of constructor localhost will get uninitialize ----
//------$this->mysqli->close()
        
    }
    public function getOnePost($id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function updatePost(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $query = "UPDATE $this->table SET title='$title',body='$body',author='$author' WHERE id = $id";
        $this->mysqli->query($query);
    }
}

    $obj = new crud();

    if(isset($_POST['save'])){
        $obj->createPost();
    }
    if(isset($_GET['delete'])){
        $obj->deletePost($_GET['delete']);
    }
    if(isset($_POST['change'])){
        $obj->updatePost();
    }
//---- when we are in edit page this method doesn't call;
    if(!isset($_GET['edit'])){
        $obj->getAllPost();
    }


?>
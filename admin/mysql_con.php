<?php

    // $link=mysql_connect("localhost"," ","","miniproject");

    $db = new mysqli("localhost","root","","miniproject");

    if($db->connect_error){
        die("Unable to connect".$db->connect_error);
    }
    $table = "CREATE  TABLE tests(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        email VARCHAR(50) NOT NULL,
        created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if($db->query($table) == true){
        echo "table created successfully<hr>";
    }else{
        echo "error <hr>";

    }

?>
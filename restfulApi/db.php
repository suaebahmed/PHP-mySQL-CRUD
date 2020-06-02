<?php

    // $link = mysqli_connect('localhost','root','','restfulapi');
    // if( mysqli_connect_error() !== null){
    //     die("Err is found: ".mysqli_connect_error());
    // }
    
    // ----wrong ----
    // while ($row = mysqli_fetch_assoc($result)) {
    //     printf ("%s (%s)\n", $row["title"], $row["body"]);
    // }

    // $sql = "INSERT INTO $table(title,body,author) VALUES('$title','$body','$author')";
    // if(mysqli_query($link,$sql)){
    //     echo "{msg: 'successfully data inserted.'}";
    //     mysqli_close($link);
    // }else{
    //     echo `{msg: ${mysqli_error()}}`;
    // }
    $link = new mysqli('localhost','root','','restfulapi') or die(mysqli_error($mysqli));
    
?>
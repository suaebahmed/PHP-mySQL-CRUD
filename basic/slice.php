<?php 
    $a = 10;
    $arr = array(10,20,30,40,50,60,70,80);


?>

<?php  ?>

<?php
    foreach($arr as $indevisual){
        echo $indevisual."<br>";
    };
    echo "<hr>";
    foreach($arr as $key => $a){
        echo $a.'<br>';
        // echo $key.'<br>';
    }

?>

<?php 
    echo "<pre>";
    echo $a;
        print_r($arr);
    echo "<pre>";

?>
<script>
// for,while ,do while;
// map,filter,
//--- ES6 for loops -----
//  forEach ,for(let x of array){}


    var arr = [10,20,30,40,50];
    var createArr = new Array(3);
        createArr[0] = 100;
        createArr[1] = 200;
        createArr[2] = 300;

    arr.forEach(i=>{
        console.log(i);
    })
    for(let x of createArr){
        console.log(x);
    }
</script>
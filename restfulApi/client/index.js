var readBtn = document.getElementById('readBtn');
var insertBtn = document.getElementById('insertBtn');
var updateBtn = document.getElementById('updateBtn');
var deleteBtn = document.getElementById('deleteBtn');

var objx = {
    name: 'suaeb'
}
var dbParams = JSON.stringify(objx);


readBtn.addEventListener('click',function(){
    var xhr2 = new XMLHttpRequest();
    xhr2.onreadystatechange = function(){
        console.log(this)
        if(this.readyState == 4){
            // check what you get?
            console.log(this.responseText);
        }
    };
    xhr2.open('GET','http://localhost/php/restfulApi/index.php?x='+dbParams); // pass parameter.
    // xhr2.open('GET','index.php');
    xhr2.send();
    
})

insertBtn.addEventListener('click',function(){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        console.log(this)
        if(xhr.readyState == 4 && xhr.status == 200){
            // check what you get?
            console.log(this.responseText);
        }
    };

    // xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.open('POST',"http://localhost/php/restfulApi/index.php",true);
    xhr.setRequestHeader('Content-type','multipart/form-data');
    xhr.send("x=",dbParams);
})

// ------------ FOR SERVER SIDE PHP -------
        //  $x = $_GET['x'];
        //  $obj = json_decode(x);

        //  $x = $_POST['x'];
        //  $obj = json_decode(x);

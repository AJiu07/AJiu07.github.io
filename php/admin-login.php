<?php

session_start();
if(!empty($_POST['username'])){
    $name = htmlentities($_POST['username']);
    $pwd  = md5(htmlentities($_POST['userpwd']));

    $pdo = new PDO("mysql:host=localhost;dbname=9c",'root','');
    $pdo->exec("set names utf8");

    $sql = "SELECT id,name,password FROM users
    WHERE name = '$name'
    AND   password = '$pwd'";
    $res = $pdo->query($sql);
    $row = $res->fetchAll(PDO::FETCH_ASSOC);

    if($row){ 
        echo $_SESSION['username'] = $name;
        echo "<script>alert('登陆成功!');location.href='../admin/main.php';</script>";
    }else{
        echo "<script>alert('登陆失败!');location.href='../admin/index.html';</script>";
    }
}





// echo json_encode($row);

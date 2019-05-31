<?php


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
        //session_start();
        echo $name;
        echo "<script>alert('登陆成功!');location.href='../admin/main.html.';</script>";
    }else{
        echo "<script>alert('登陆失败!');location.href='../admin/index.html.';</script>";
    }
}





// echo json_encode($row);
<?php

    require 'pdo.php';

    if(!empty($_POST['name'])){
        $name    = htmlentities($_POST['name']);
        $content = htmlentities($_POST['content']);
        $email   = htmlentities($_POST['email']);

        $date = date("Y/m/d H:i");
        $sql = "INSERT INTO lword(name,content,email,registration)
                VALUES ('$name','$content','$email','$date')";
        $res = $pdo->exec($sql);

        /* 验证 */ 
        if(!$res || $res == ''){
           echo "<script>alert('留言失败，你肯定是乱输的');location.href='../message.html';</script>";
        }else{
            echo "<script>alert('留言成功');location.href='../message.html';</script>";
        }
    }else{
        echo "<script>alert('什么都不写你为什么要留言');location.href='../message.html';</script>";
    }
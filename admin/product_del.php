<?php
    require '../php/pdo.php';

    //1.接收id
    $id = intval($_GET['id']);
    //2.从数据库中删除相应数据
    $sql = "DELETE FROM blog WHERE id = '$id'";
    $row = $pdo->exec($sql);
    if($row) {
        echo ('删除成功');
    } else {
        echo ('删除失败');
    }
    //3.跳回列表页
    header('location: products.php' );
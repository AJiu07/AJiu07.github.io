<?php
    require 'pdo.php';

    $sql = "SELECT id,title,intro,classify,content,registration FROM blog  ORDER BY id DESC";
    $res = $pdo->query($sql);
    $row = $res->fetchAll();
    /* 把查询出来的数据转为JSON对象输出 */
    echo json_encode($row,JSON_UNESCAPED_UNICODE);


    
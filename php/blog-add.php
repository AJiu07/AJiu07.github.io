<?php

require 'pdo.php';

$id = $_GET['id'];
$sql = "SELECT id,title,content,registration FROM blog
WHERE id = '$id'";
$res = $pdo->query($sql);
$row = $res->fetchAll();

/* 把查询出来的数据转为JSON对象输出 */
echo json_encode($row,JSON_UNESCAPED_UNICODE);

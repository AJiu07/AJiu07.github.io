<?php


//172.27.0.9
$pdo = new PDO("mysql:host=localhost;dbname=9c",'root','');
$pdo->exec("set names utf8");
$sql = "SELECT * FROM yolo ORDER BY id DESC LIMIT 4";
//$sql = "SELECT * FROM yolo";
$res = $pdo->query($sql);
$row = $res->fetchAll();

echo json_encode($row,JSON_UNESCAPED_UNICODE);

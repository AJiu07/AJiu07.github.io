<?php

// $a = require 'db.php';

// $a->update('yolo', ['username'=>'yolo'], ['id'=>1]);

// var_dump('<pre>');
// var_dump($a->getOne('yolo',['id'=>1]));

/**
 * 
 */
// class Site{
//     public $public = 'Public';
//     function setUrl(){
//         echo $this->public;
//     }
// }


// $site = new Site();
// echo $this->public;



$pdo = new PDO("mysql:host=172.27.0.9;dbname=ajiu",'root','AJiu0707');
$pdo->exec("set names utf8");
$sql = "SELECT username password  FROM yolo";
//$sql = "SELECT * FROM yolo";
$res = $pdo->query($sql);
$row = $res->fetchAll();
var_dump($row);
echo json_encode($row,JSON_UNESCAPED_UNICODE);



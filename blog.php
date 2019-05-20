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



$pdo = new PDO("mysql:host=localhost;dbname=9c",'root','');
$pdo->exec("set names utf8");
$sql = "SELECT username FROM yolo";
$res = $pdo->query($sql);
$row = $res->fetchAll();

echo json_encode($row,JSON_UNESCAPED_UNICODE);



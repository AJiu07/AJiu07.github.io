<?php

require 'pdo.php';

$sql = "SELECT id,name,content FROM lword ORDER BY id DESC";

$res = $pdo->query($sql);
$row = $res->fetchAll();

echo json_encode($row,JSON_UNESCAPED_UNICODE);

<?php

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', ''); //root全権限がある
  } catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
  }
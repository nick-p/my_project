<?php
$pdo = new PDO('mysql:localhost;dbname=ijdb; charset=utf-8', 'ijdbuser', 'mypassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'ijdbuser', 'mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `joketext` FROM `joke`';
    $result = $pdo->query($sql);

    foreach ($result as $row) {
        $jokes[] = $row['joketext'];
    }
} catch (PDOException $e) {
    $error = 'Unable to connect to the database server: ' . $e->getMessage() . 
        ' in ' . $e->getFile() . ':' . $e->getLine() ;
}

include __DIR__ . '/../templates/jokes.html.php';

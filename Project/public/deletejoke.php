<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    deleteJoke($pdo, $_POST['id']);

    header('location: jokes.php');

    ob_start();

    include __DIR__ . '/../templates/jokes.html.php';

    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';
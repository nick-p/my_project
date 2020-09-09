<?php

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');
    $row = $query->fetch();
    return $row[0];
}

function getJoke($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM `joke` WHERE `id` = :id', $parameters);

    return $query->fetch();
}

function insertJoke($pdo, $fields) {
    $query = 'INSERT INTO `joke` (';
        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }
        $query = rtrim($query, ',');
        $query .= ') VALUES ('; 

        foreach ($fields as $key => $value) {
            $query .= ':' . $key . ',';
        }
        $query = rtrim($query, ',');
        $query .= ')';

        $fields = processDates($fields);

        query($pdo, $query);
}

function updateJoke($pdo, $fields) {
    $query = 'UPDATE `joke` SET';

    foreach ($fields as $key => $value) {
        $query .= '`' .$key . '` = :' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE `id` = :primaryKey';

    $fields['primaryKey'] = $fields['id'];

    $fields = processDates($fields);

    query($pdo, $query, $fields);
}

function deleteJoke($pdo, $id) {
    $parameters = [':id' => $id];

    query($pdo, 'DELETE FROM `joke` WHERE `id` = :id', $parameters);
}

function allJokes($pdo) {
    $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`, `name`, `email`
        FROM `joke` INNER JOIN `author`
        ON `authorid` = `author`.`id`');
    
    return $jokes->fetchAll();
}

function processDates($fields) {
    foreach ($fields as $key => $value) {
        if ($value instanceof DateTime) {
            $field[$key] = $value->format('Y-m-d');
        }
    }
    return $fields;
}
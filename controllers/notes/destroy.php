<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findorFail();

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
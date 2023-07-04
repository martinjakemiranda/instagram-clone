<?php

use Core\App;
use Core\Database;
use core\Validator;

$db = App::resolve(Database::class);

// Find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findorFail();

// Validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// If no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// Redirect the user
header('location: /notes');
die();


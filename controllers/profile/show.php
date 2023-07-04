<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Connect to the database, and execute a query.
//Never in line user data into a query string to avoid of getting a malicious intent to database.

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
    ])->findorFail();

//Magic Number - It serves the purpose of identifying what the value is it provides
//more clarity as to what the value is. Example for $currentUserID =1;

view("profile/show.view.php", [
    'heading' => 'Edit Profile',
]);
<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_SESSION['user']['email'];

$user = $db->query('SELECT * from users WHERE email = :email', [
    'email' => $email
])->find();

view("profile/edit.view.php", [
    'heading' => 'Edit Profile',
]);
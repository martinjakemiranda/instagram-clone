<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Login the user if the credentials match.

$db = App::resolve(Database::class);
// Check if the account already exists

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide an email address or username';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a password.';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

// Match the credentials.
$user = $db->query('select* from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // We have a user, but we don't know if the password privded matches what we have in the database.
    if (password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
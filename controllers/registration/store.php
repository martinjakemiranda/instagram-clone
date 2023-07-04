<?php

use Core\App;
use Core\Database;
use Core\Validator; 

$db = App::resolve(Database::class);
// Check if the account already exists

$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];


// Validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($fullname, 2, 255)) {
    $errors['fullname'] = 'Please provide your full name';
}

if (!Validator::string($username, 5, 255)) {
    $errors['username'] = 'Please provide a username of at least five characters. ';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email AND username = :username', [
    'email' => $email,
    'username' => $username
])->find();


if ($user) {
    // then someone with that email already exists and has an account.
    // If yes, redirect to a login page.
    header('location: /');
    exit();
} else {
    // If not, save one the database, and then log the user in, and redirect.
    // NEVER store database passwords in clear text.
    $db->query('INSERT INTO users(email, fullname, username, password) VALUES(:email, :fullname, :username, :password)', [
        'email' => $email,
        'fullname' =>$fullname,
        'username' =>$username,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Mark that the user has logged in.
    login($user);

    header('location: /');
    exit();
}
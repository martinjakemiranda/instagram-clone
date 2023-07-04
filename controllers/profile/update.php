<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;
// Check if a file was uploaded
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $avatarFile = $_FILES['avatar']['tmp_name'];
    
    // Define the directory where you want to store the avatar
    $avatarDirectory = $_SERVER['DOCUMENT_ROOT'] . "/";

    // Generate a unique filename for the avatar
    $avatarFilename = uniqid('avatar_') . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    // Move the uploaded file to the avatar directory
    if (move_uploaded_file($avatarFile, $avatarDirectory . $avatarFilename)) {
        // File successfully uploaded, you can now store the filename in the database or perform any other necessary actions
        $email = $_SESSION['user']['email'];

        // Update the avatar column in the users table
        $db->query('UPDATE users SET avatar = :avatar WHERE email = :email', [
            'avatar' => $avatarFilename,
            'email' => $email
        ]);

        $user = $db->query('SELECT * from users WHERE email = :email', [
            'email' => $email
        ])->find();

        $_SESSION['user'] = $user;

        session_regenerate_id(true);

        // Redirect the user
        header('Location: /');
        exit();
    } else {
        // File upload failed
        return 'Failed to upload the avatar.';
    }
} else {
    // No file uploaded or an error occurred during upload
    return 'No avatar file uploaded or an error occurred.';
}

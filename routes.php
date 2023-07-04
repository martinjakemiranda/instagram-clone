<?php

//refractor from if - else if //set as same with config.
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/contact' => 'controllers/contact.php',
//     '/ourmission' => 'controllers/ourmission.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/note/create' => 'controllers/notes/create.php'
// ];


//Converted into new syntax from old one at the top

$router->get('/', 'controllers/index.php')->only('auth');
$router->get('/about', 'controllers/about.php')->only('auth');
$router->get('/contact', 'controllers/contact.php')->only('auth');
$router->get('/ourmission', 'controllers/ourmission.php')->only('auth');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php')->only('auth');

$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/note', 'controllers/notes/update.php')->only('auth');

$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/note', 'controllers/notes/store.php')->only('auth');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');


$router->get('/profile', 'controllers/profile/edit.php')->only('auth');
$router->get('/profile', 'controllers/profile/show.php')->only('auth');
$router->patch('/profile', 'controllers/profile/update.php')->only('auth');

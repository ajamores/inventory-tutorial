<?php

use Core\App;


$db = App::resolve('Core\Database');

$currentUser = 1; 

$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = ?', [$id])->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);
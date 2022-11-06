<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

session_start();

$id = $_GET['id'] ?? null;

$valid = true;
if (empty($_POST['name'])) {
     $valid= false;
}


if ($id) {
  $album = find($id, 'Album');
} else {
    $album = new Album;
}



$album->name = $_POST['name'] ?? $album->name;
$album->author = $_POST['author'] ?? $album->author;
$album->length = $_POST['length'] ?? $album->length;
$album->year = $_POST['year'] ?? $album->year;

if ($id) {
    update($id, $album);
    $_SESSION["edit_message"]="Album edited successfully";
} else {
    $id = insert($album);
}


//inserting into storage and getting id:
// $id = insert($album);
// var_dump($id);


$_SESSION["success_message"]="Album saved successfully";


header('Location: edit.php?id='.$id);
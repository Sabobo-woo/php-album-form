<?php
//forth
require_once 'DBBlackbox.php';
require_once 'Album.php';

session_start();




if(isset($_SESSION['success_message'])) {
  $success_message = $_SESSION["success_message"];
  unset($_SESSION["success_message"]);
}


if(isset($_SESSION['edit_message'])) {
  $edit_message = $_SESSION["edit_message"];
  unset($_SESSION["edit_message"]);
}

$id = $_GET['id'] ?? null;
$album = find($id, 'Album');

if ($id) {
   $album = find($id, 'Album');
} else {
    $album = new Album;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
</head>
<body>
     <style>
    .success-message {
      background-color: pink;
      
    }
  </style>

<?php if (!empty($success_message)) : ?>
  <div class=success-message>
<?= $success_message ?>
  </div>

    <?php endif; ?>

  <?php if (!empty($edit_message)) : ?>
  <div class=edit-message>
<?= $edit_message ?>
  </div>
 
  <?php endif; ?>

  

  <?php if ($id) : ?>
    <form action="save.php?id=<?= $id ?>" method="post">
<?php else : ?>
    <form action="save.php" method="post">
<?php endif; ?>
  
    <!-- display the form prefilled with entity data -->
    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars((string)$album->name) ?>"><br>
    <br>
    Author:<br>
    <input type="text" name="author" value="<?= htmlspecialchars((string)$album->author) ?>"><br>
    <br>
    Length:<br>
    <input type="number" name="length" value="<?= htmlspecialchars((string)$album->length)?>"> seconds<br>
    <br>
    Year:<br>
    <input type="text" name="album" value="<?= htmlspecialchars((string)$album->year) ?>"><br>
    <br>
    <button type="submit">Save</button>
    <?php if ($album = find($id, 'Album')) : ?>
<button>Edit</button>
  <?php endif; ?>
</form>  
</body>
</html>
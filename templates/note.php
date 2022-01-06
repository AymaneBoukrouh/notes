<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/login_required.php');

$note = require($_SERVER['DOCUMENT_ROOT'].'/modules/note/get_note.php');

$title = $note['title'];
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <a class="btn btn-primary go-back-button" href="notes.php">Go Back To Notes</a>
    <table>
      <tr><td>Created at:&emsp;</td><td><?= $note['creation_datetime']; ?></td></tr>
      <tr><td><?php if(isset($note['last_edit_datetime'])) echo 'Edited at:&emsp;</td><td>'.$note['last_edit_datetime']; ?></td></tr>
    </table>
    <div class="text-center mb-3"><h3><?= $note['title']; ?></h3></div>
    <div class="note note-content"><?= $note['content']; ?></div>
    <a class="btn btn-primary w-100 mb-1" href="edit_note.php?id=<?= $note['id']; ?>">Edit</a>
    <a class="btn btn-danger w-100" href="/modules/note/delete_note.php?id=<?= $note['id']; ?>">Delete</a>
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'); ?>
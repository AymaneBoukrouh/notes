<?php

require_once('../modules/get_note_module.php');

$TITLE = $note['title'];
require_once('../includes/header.php');

?>
    <a class="btn btn-primary" href="notes.php">Go Back To Notes</a>
    <br><br>
    <table>
      <tr><td>Created at:&emsp;</td><td><?= $note['creation_datetime']; ?></td></tr>
      <tr><td><?php if(isset($note['last_edit_datetime'])) echo 'Edited at:&emsp;</td><td>'.$note['last_edit_datetime']; ?></td></tr>
    </table>
    <div class="text-center mb-3"><h3><?= $note['title']; ?></h3></div>
    <div class="note note-content"><?= $note['content']; ?></div>
    <a class="btn btn-primary w-100 mb-1" href="edit_note.php?id=<?= $note['id']; ?>">Edit</a>
    <a class="btn btn-danger w-100" href="../modules/delete_note_module.php?id=<?= $note['id']; ?>">Delete</a>
    </form>
<?php require_once('../includes/footer.php'); ?>
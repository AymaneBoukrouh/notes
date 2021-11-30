<?php

require_once('../modules/get_note_module.php');

$TITLE = $note['title'];
require_once('../includes/header.php');

?>
    <a class="btn btn-primary" href="notes.php">Go Back To Notes</a>
    <br><br>
    <div class="text-center mb-3"><h3><?= $note['title']; ?></h3></div>
    <div class="note note-content"><?= $note['content']; ?></div>
    <a class="btn btn-primary w-100" href="edit_note.php?id=<?= $note['id']; ?>">Edit</a>
    </form>
<?php require_once('../includes/footer.php'); ?>
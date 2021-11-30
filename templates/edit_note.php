<?php

require_once('../modules/get_note_module.php');

$TITLE = $note['title'];
require_once('../includes/header.php');

?>
    <a class="btn btn-primary" href="notes.php">Go Back To Notes</a>
    <br><br>
    <div class="text-center mb-3"><h3>Edit Note</h3></div>
    <form action="../modules/edit_note_module.php?id=<?= $note['id'] ?>" method="POST">
      <div class="mb-3">
        <label class="form-label" for="note-title">Title</label>
        <input type="text" class="form-control" name="note-title" value="<?= $note['title']; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="note-content">Content</label>
        <textarea class="form-control" name="note-content" rows="3"><?= $note['content']; ?></textarea>
      </div>
      <input type="submit" class="btn btn-primary w-100" value="Edit">
    </form>
<?php require_once('../includes/footer.php'); ?>
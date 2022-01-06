<?php

$title = 'Add Note';
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <a class="btn btn-primary go-back-button" href="notes.php">Go Back To Notes</a>
    <div class="text-center mb-3"><h3>Add Note</h3></div>
    <form action="/modules/note/add_note.php" method="POST">
      <div class="mb-3">
        <label class="form-label" for="note-title">Title</label>
        <input type="text" class="form-control" name="note-title">
      </div>
      <div class="mb-3">
        <label class="form-label" for="note-content">Content</label>
        <textarea class="form-control" name="note-content" rows="3"></textarea>
      </div>
      <input type="submit" class="btn btn-primary w-100" value="Add">
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'); ?>
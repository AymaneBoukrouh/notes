<?php

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center"><h3>Notes</h3></div>
    <?php require_once('../modules/get_notes_module.php') ?>
    <?php foreach($notes as $note): ?>
    <div class="note">
      <div class="d-flex justify-content-between">
        <div class="note-creation-datetime text-muted">
        <?php
          if(isset($note['last_edit_datetime'])) echo $note['last_edit_datetime'].' (edited)';
          else echo $note['creation_datetime'];
        ?>
        </div>
        <div>
          <a class="edit-link" href="edit_note.php?id=<?= $note['id']; ?>"><i class="bi-pencil-square"></i></a>
          <a class="del-link" href="../modules/delete_note_module.php?id=<?= $note['id']; ?>"><i class="bi-trash-fill"></i></a>
        </div>
      </div>
      <div class="w-100 text-center mb-3"><a class="note-title" href="note.php?id=<?= $note['id'] ?>"><?= $note['title']; ?></a></div>
      <div class="note-content"><?= $note['content']; ?></div>
    </div>
    <?php endforeach; ?>
    <?php if (!$NOTES): ?>
    <div class="empty-note text-muted">You don't have any notes yet, click below to add a new Note!</div>
    <?php endif; ?>
    <a class="btn btn-primary w-100" href="add_note.php">+</a>
<?php require_once('../includes/footer.php'); ?>
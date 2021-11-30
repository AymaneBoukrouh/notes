<?php

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center"><h3>Notes</h3></div>
	<?php require_once('../modules/get_notes_module.php') ?>
	<?php foreach($notes as $note): ?>
	<div class="note">
      <div class="d-flex justify-content-between mb-3">
	    <a class="note-title" href="note.php?id=<?= $note['id'] ?>"><?= $note['title']; ?></a>
	    <div class="note-creation-datetime text-muted"><?= $note['creation_datetime']; ?></div>
	    <a class="btn btn-danger" href="../modules/delete_note_module.php?id=<?= $note['id']; ?>">delete</a>
	  </div>
	  <div class="note-content"><?= $note['content']; ?></div>
	</div>
	<?php endforeach; ?>
	<?php if (!$NOTES): ?>
    <div class="empty-note text-muted">You don't have any notes yet, click below to add a new Note!</div>
    <?php endif; ?>
    <a class="btn btn-primary w-100" href="add_note.php">+</a>
<?php require_once('../includes/footer.php'); ?>
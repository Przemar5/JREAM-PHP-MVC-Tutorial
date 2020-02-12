<h1>Edit Note</h1>

<?php //echo "<pre>"; print_r($this->user); ?>

<form action="<?php echo URL; ?>note/editSave/<?php echo $this->note['id']; ?>" method="post">
	<label for="">
		Title
		<input type="text" name="title" value="<?php echo $this->note['title']; ?>">
	</label>

	<br>

	<label for="">
		Password
		<textarea name="description"><?php echo $this->note['description']; ?></textarea>
	</label>

	<br>

	<label for="">
		&nbsp;
		<input type="submit">
	</label>
</form>
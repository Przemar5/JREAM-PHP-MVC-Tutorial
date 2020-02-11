<h1>Edit user</h1>

<?php //echo "<pre>"; print_r($this->user); ?>

<form action="<?php echo URL; ?>/user/editSave/<?php echo $this->user['id']; ?>" method="post">
	<label for="">
		Login
		<input type="text" name="login">
	</label>

	<br>

	<label for="">
		Password
		<input type="password" name="password" value="<?php echo $this->user[''] ?>">
	</label>

	<br>

	<label for="">
		Role
		<select name="role" id="role">
			<option value="default" <?php if ($this->user['role'] == 'default') echo 'selected'; ?>>Default</option>
			<option value="admin"  <?php if ($this->user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
		</select>
	</label>

	<br>

	<label for="">
		&nbsp;
		<input type="submit">
	</label>
</form>
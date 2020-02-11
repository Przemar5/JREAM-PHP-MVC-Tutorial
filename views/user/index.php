	<h1>
		User
	</h1>
	
	<form action="<?php echo URL; ?>user/create" method="post">
		<label for="">
			Login
			<input type="text" name="login">
		</label>
		
		<br>
		
		<label for="">
			Password
			<input type="password" name="password">
		</label>
		
		<br>
		
		<label for="">
			Role
			<select name="role" id="role">
				<option value="default">Default</option>
				<option value="admin">Admin</option>
			</select>
		</label>
		
		<br>
		
		<label for="">
			&nbsp;
			<input type="submit">
		</label>
	</form>
	
	<hr>
	
	<table>
		<thead>
			<?php if (!empty($this->userList)): ?>
				<?php foreach ($this->userList[0] as $key => $value): ?>
				<th>
					<?php echo $key; ?>
				</th>
				<?php endforeach; ?>
			<?php endif; ?>
			<th></th>
		</thead>
		
		<tbody>
			<?php foreach ($this->userList as $user): ?>
			<tr>

				<?php foreach ($user as $key => $value): ?>
				<td>
					<?php echo $value; ?>
				</td>
				<?php endforeach; ?>

				<td>
					<a href="<?php echo URL . 'user/edit/' , $user['id']; ?>">Edit</a>

					<a href="<?php echo URL . 'user/delete/' , $user['id']; ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<h1>
		Note
	</h1>
	
	<form action="<?php echo URL; ?>note/create" method="post">
		<label for="">
			Title
			<input type="text" name="title">
		</label>
		
		<br>
		
		<label for="">
			Description
			<textarea name="description"></textarea>
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
			<?php if (!empty($this->noteList)): ?>
				<?php foreach ($this->noteList[0] as $key => $value): ?>
				<th>
					<?php echo $key; ?>
				</th>
				<?php endforeach; ?>
			<?php endif; ?>
			<th></th>
		</thead>
		
		<tbody>
			<?php foreach ($this->noteList as $note): ?>
			<tr>

				<?php foreach ($note as $key => $value): ?>
				<td>
					<?php echo $value; ?>
				</td>	
				<?php endforeach; ?>

				<td>
					<a href="<?php echo URL . 'note/edit/' , $note['id']; ?>" class="edit">Edit</a>

					<a href="<?php echo URL . 'note/delete/' , $note['id']; ?>" class="delete">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<script>
		$(function() {
			$('.delete').click(function(e) {
				//e.preventDefault()
				
				var c = confirm('Are you sure you want to delete this note?')
				
				if (c == false)
					return false
			})
		})
	</script>
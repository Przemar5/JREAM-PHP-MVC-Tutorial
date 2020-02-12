<?php


require_once '../libs/Form.php';
require_once '../libs/Database.php';

if (isset($_REQUEST['run'])) {
	try {
		$form = new Form;

		$form	->post('name')
				->val('minlength', 4)
			
				->post('age')
				->val('minlength', 2)
				->val('integer')
			
				->post('gender');
		$data = $form->fetch();

		echo "<pre>";
		print_r($form);
		echo "</pre>";
		
		$db = new Database;
		$db->insert('person', $data);
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
}

?>


<form action="?run" method="post">
	Name <input type="text" name="name">
	Age <input type="text" name="age">
	Gender <select name="gender">
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select>
	<input type="submit">
</form>
<?php


class Note_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function noteList()
	{
		return $this->db->select('note', null, ['user_id' => $_SESSION['userId']]);
	}
	
	public function noteSingleList($id)
	{
		$where = [
			'user_id' => $_SESSION['userId'],
			'id' => $id,
		];
		
		return $this->db->select('note', [], $where);
	}
	
	public function create($request)
	{
		$data = [
			'user_id' => $_SESSION['userId'],
			'title' => $request['title'],
			'description' => $request['description'],
			'date_added' => date('Y-m-d H:i:s'),
		];
		
		$this->db->insert('note', $data);
	}
	
	public function editSave($request)
	{
		$data = [
			'title' => $request['title'],
			'description' => $request['description'],
		];
		$where = [
			'id' => $request['id'],
			'user_id' => $_SESSION['userId'],
		];
		
		$this->db->update('note', $data, $where);
	}
	
	public function delete($id)
	{
		$where = [
			'id' => $id, 
			'user_id' => $_SESSION['userId']
		];

		$this->db->delete('note', $where);
	}
}
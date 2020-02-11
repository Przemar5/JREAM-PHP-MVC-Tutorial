<?php


class User_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function userList()
	{
		return $this->db->select('users', ['id', 'login', 'role']);
	}
	
	public function userSingleList($id)
	{
		return $this->db->select('users', ['id', 'login', 'role'], ['id' => $id]);
	}
	
	public function create($request)
	{
		$data = [
			'login' => $request['login'],
			'password' => $request['password'],
			'role' => $request['role'],
		];
		
		$this->db->insert('users', $data);
	}
	
	public function editSave($request)
	{
		$data = [
			'login' => $request['login'],
			'password' => $request['password'],
			'role' => $request['role'],
		];
		
		$this->db->update('users', $data, 'id = '.$request['id']);
	}
	
	public function delete($id)
	{
		$role = $this->db->select('users', 'role', ['id' => $id])['role'];
		
		if ($role !== 'owner') {
			$this->db->delete('users', ['id' => $id]);
		}
	}
}
<?php


class Dashboard_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function xhrInsert()
	{
		$name = $_POST['text'];
		
		$this->db->insert('data', ['text' => $name]);
		
		$data = [
			'text' => $name,
			'id' => $this->db->lastInsertId()
		];
		
		echo json_encode($data);
	}
	
	public function xhrGetListings()
	{
		$data = $this->db->select('data');
		
		echo json_encode($data);
	}
	
	public function xhrDeleteListing()
	{
		$id = $_POST['id'];
		
		$this->db->delete('data', ['id' => (int) $id]);
	}
}
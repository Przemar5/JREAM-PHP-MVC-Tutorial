<?php

class Note extends Controller
{
	public function __construct()
	{
		parent::__construct();
		Auth::handleLogin();
	}
	
	public function index()
	{
		$this->view->title = 'Notes';
		$this->view->noteList = $this->model->noteList();
		$this->view->render('note/index');
	}
	
	public function create()
	{
		$data = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
		];
		
		$this->model->create($data);
		$path = URL . 'note';
		
		header('Location: '.$path);
	}
	
	public function edit($id)
	{
		$this->view->title = 'Edit note';
		$this->view->note = $this->model->noteSingleList($id);
		$this->view->render('note/edit');
	}
	
	public function editSave($id)
	{
		$data = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'id' => $id,
		];
		$this->model->editSave($data);
		
		$path = URL . 'note';
		
		header('Location: '.$path);
	}
	
	public function delete($id)
	{
		$this->model->delete($id);
		$path = URL . 'note';
		
		header('Location: '.$path);
	}
}
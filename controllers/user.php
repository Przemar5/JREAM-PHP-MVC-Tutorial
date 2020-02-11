<?php


class User extends Controller
{
	public function __construct()
	{
		parent::__construct();
		
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		
		if ($logged == false || $role != 'owner') {
			Session::destroy();
			$path = URL . '/login';
			
			header('Location: '.$path);
			exit();
		}
		
		$this->view->js = [
			'dashboard/js/default.js',
		];
	}
	
	public function index()
	{
		$this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}
	
	public function create()
	{
		$data = [
			'login' => $_POST['login'],
			'password' => $_POST['password'],
			'role' => $_POST['role'],
		];
		
		$this->model->create($data);
		$path = URL . '/user';
		
		header('Location: '.$path);
	}
	
	public function edit($id)
	{
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/edit');
	}
	
	public function editSave($id)
	{
		$data = [
			'id' => $id,
			'login' => $_POST['login'],
			'password' => $_POST['password'],
			'role' => $_POST['role'],
		];
		$this->model->editSave($data);
		
		$path = URL . '/user';
		
		header('Location: '.$path);
	}
	
	public function delete($id)
	{
		$this->model->delete($id);
		$path = URL . '/user';
		
		header('Location: '.$path);
	}
}
<?php


class Dashboard extends Controller
{
	public function __construct()
	{
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		
		if ($logged == false) {
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
		$this->view->render('dashboard/index');
	}
	
	public function logout()
	{
		Session::destroy();
		$path = URL . '/login';
		
		header('Location: '.$path);
		exit();
	}
	
	public function xhrInsert()
	{
		$this->model->xhrInsert();
	}
	
	public function xhrGetListings()
	{
		$this->model->xhrGetListings();
	}
	
	public function xhrDeleteListing()
	{
		$this->model->xhrDeleteListing();
	}
}
<?php


class Help extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$this->view->title = 'Help';
		$this->view->render('help/index');
	}
	
	
	public function other($arg = false)
	{
		require_once 'models/help_model.php';
		
		$model = new Help_Model;
		$this->view->blah = $model->blah();
	}
}
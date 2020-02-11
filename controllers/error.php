<?php


class PageError extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$this->view->msg = "This page doesn't exist!";
		$this->view->render('error/index');
	}
}
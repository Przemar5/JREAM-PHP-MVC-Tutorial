<?php


class Controller
{
	public function __construct()
	{
		$this->view = new View;
	}
	
	public function loadModel($name, $modelPath) 
	{
		$path = $modelPath . $name . '_model.php';
		
		if (file_exists($path)) {
			require_once $path;
			
			$modelName = $name . '_Model';
			$this->model = new $modelName;
		}
	}
}
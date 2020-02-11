<?php


class Bootstrap
{
	public function __construct()
	{
		Session::init();
		
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);

//		echo "<pre>";
//		print_r($url);

		if (empty($url[0])) {
			require_once 'controllers/index.php';
			
			$controller = new Index;
			$controller->index();
			
			return false;
		}
		
		$file = 'controllers/' . $url[0] . '.php';
		
		if (file_exists($file)) {
			require_once $file;
		}
		else {
			require_once 'controllers/error.php';
			
			$controller = new PageError;
			
			return false;
		}

		$controller = new $url[0];
		$controller->loadModel($url[0]);

		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			}
			else {
				echo 'Error';
			}
		}
		else if (isset($url[1])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}();
			}
			else {
				echo 'Error';
			}
		}
		else if (isset($url[0])) {
			$controller->index();
		}
		
		return false;
	}
}
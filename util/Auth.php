<?php


class Auth
{
	public static function handleLogin()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		
		$logged = Session::get('loggedIn');
		
		if ($logged == false) {
			session_destroy();
			$path = URL . '/login';
			
			header('Location: '.$path);
			exit();
		}
	}
}
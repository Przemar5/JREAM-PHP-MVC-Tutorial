<?php


class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function test()
	{
		echo 'Login model';
	}
	
	public function run()
	{
		$login 		= $_POST['login'];
		$password 	= $_POST['password'];
		
		$query = "SELECT role 
					FROM users 
					WHERE login = :login
					AND password = :password";
		$params = [
			'login' 	=> 	$login,
			'password' 	=> 	$password
		];
		$stmt = $this->db->prepare($query);
		$stmt->execute($params);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$rows = $stmt->rowCount();
		
		if ($rows === 1) {
			Session::init();
			Session::set('loggedIn', true);
			Session::set('role', $data['role']);
			
			$path = URL . '/dashboard';
//			echo $path; die();
			header('Location: '.$path);
		}
		else {
			$path = URL . '/login';
			
			header('Location: '.$path);
		}
	}
}
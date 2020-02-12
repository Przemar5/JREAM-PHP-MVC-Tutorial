<?php


class Database extends PDO
{
	private const DB_TYPE = 'mysql';
	private const DB_HOST = 'localhost';
	private const DB_USER = 'root';
	private const DB_PASS = '';
	private const DB_NAME = 'jream_mvc';
	
	public function __construct()
	{
		$dsn = $this::DB_TYPE . ':host=' . $this::DB_HOST . ';dbname=' . $this::DB_NAME . ';';
		
		parent::__construct($dsn, $this::DB_USER, $this::DB_PASS);
//		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function select($table, $data = [], $where = [], $fetchMode = PDO::FETCH_ASSOC)
	{
		$values; $condition = ''; $params = [];
		
		if ($data != null) {
			if (gettype($data) === 'string') {
				$values = $data;
			}
			else if (gettype($data) === 'array') {
				$values = implode(', ', $data);
			}
		}
		else {
			$values = '*';
		}
		
		
		if (!empty($where)) {
			if (gettype($where) === 'array') {
				$mappedValues = array_map(function($key) {
									return "$key = :$key";
								}, array_keys($where));
				$condition = "WHERE " . implode(' AND ', $mappedValues);
				$params = $where;
			}
			else if (gettype($where) === 'string') {
				$condition = "WHERE $where";
			}
		}
		
		$query = "SELECT $values FROM $table $condition";
		$stmt = $this->prepare($query);
		$stmt->execute($params);
		$rows = $stmt->rowCount();
		
		if ($rows > 1) {
			return $result = $stmt->fetchAll($fetchMode);
		}
		else if ($rows === 1) {
			return $result = $stmt->fetch($fetchMode);
		}
		else {
			return null;
		}
	}
	
	public function insert($table, $data)
	{
		ksort($data);
		
		$fieldNames = implode(', ', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$query = "INSERT INTO $table ($fieldNames) VALUES ($fieldValues)";
		$stmt = $this->prepare($query);
		
//		foreach ($data as $key => $value) {
//			$stmt->bindValue(":$key", $value);
//		}
		echo $query . "<br>";
		$stmt->execute($data);
	}
	
	public function update($table, $data, $where)
	{
		ksort($data);
		$params = [];
		
		$fieldDetails = implode(', ', array_map(function($key) {
			return "$key = :$key";
		}, array_keys($data)));
		
		if (!empty($where)) {
			if (gettype($where) === 'array') {
				$mappedValues = array_map(function($key) {
									return "$key = :$key";
								}, array_keys($where));
				$condition = "WHERE " . implode(' AND ', $mappedValues);
				$params = $where;
			}
			else if (gettype($where) === 'string') {
				$condition = "WHERE $where";
			}
		}
		
		$query = "UPDATE $table SET $fieldDetails $condition";
		$stmt = $this->prepare($query);
		
		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}
		$params = array_merge($params, $data);
		
		$stmt->execute($params);
	}
	
	public function delete($table, $where, $limit = 1)
	{
		$condition = ''; $params = [];
		
		if (!empty($where)) {
			if (gettype($where) === 'array') {
				$mappedValues = array_map(function($key) {
									return "$key = :$key";
								}, array_keys($where));
				$condition = "WHERE " . implode(' AND ', $mappedValues);
				$params = $where;
			}
			else if (gettype($where) === 'string') {
				$condition = "WHERE $where";
			}
		}
		
		$limit = (!empty($limit)) ? "LIMIT " . $limit : "";
		
		$query = "DELETE FROM $table $condition $limit";
		$stmt = $this->prepare($query);
		$stmt->execute($params);
	}
	
	private function getEqualsConditions($values)
	{
		if (!empty($values)) {
			if (gettype($values) === 'array') {
				$mappedValues = array_map(function($key) {
									return "$key = :$key";
								}, array_keys($where));
				return [implode(', ', $mappedValues), $values];
			}
			else if (gettype($where) === 'string') {
				return [$where, []];
			}
		}
	}
}
<?php

require_once 'Form/Val.php';


class Form
{
	private $_currentItem = null;
	private $_postData = [];
	private $_val = [];
	private $_error = [];
	
	public function __construct()
	{
		$this->_val = new Val;
	}
	
	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		
		return $this;
	}
	
	public function fetch($fieldName = false)
	{
		if ($fieldName) {
			if (isset($this->_postData[$fieldName])) {
				return $this->_postData[$fieldName];
			}
			else {
				return false;
			}
		}
		else {
			return $this->_postData;
		}
	}
	
	public function val($typeOfValidator, $arg = null)
	{
		$currentItem = $this->_postData[$this->_currentItem];
		
		if ($arg == null) {
			$error = $this->_val->{$typeOfValidator}($currentItem);
		}
		else {
			$error = $this->_val->{$typeOfValidator}($currentItem, $arg);
		}
		
		
		if ($error) {
			$this->error[$this->_currentItem] = $error;
		}
		
		return $this;
	}
	
	public function submit()
	{
		if (empty($this->_error)) {
			return true;
		}
		else {
			$errors = implode(', ', $this->_error);
			throw new Exception($errors);
		}
	}
}
<?php


class Val
{
	public function __construct()
	{
		
	}
	
	public function minlength($data, $arg)
	{
		if (strlen($data) < $arg) {
			return "Your string can be only $arg long.";
		}
	}
	
	public function maxlength($data, $arg)
	{
		if (strlen($data) > $arg) {
			return "Your string can be $arg characters maximum.";
		}
	}
	
	public function integer($data)
	{
		if (!is_numeric($data)) {
			return "Your string must be a digit.";
		}
	}
}
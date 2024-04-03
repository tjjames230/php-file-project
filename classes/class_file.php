<?php

class File
{
	public $file_name;

	function __construct(string $file_name)
	{
		$this->file_name = $file_name;
	}

	function get_name()
	{
		return $this->file_name;
	}
}

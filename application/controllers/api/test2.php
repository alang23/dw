<?php

class Test2 extends Api_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		echo __CLASS__;
	}
}
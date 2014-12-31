<?php

class Test extends Api_Controller
{
	

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('test');
    	/**注册****/
    	$arr = array('name'=>'register',
    		'data'=>array(
    			'username'=>'admin',
    			'passwd'=>'123456',
    			'realname'=>'admin',
    			'mobile'=>'13800138000',
    			'roleid'=>'1',
    			)
    		);
    	/**注册****/

    	/**集体攻关****/
    	$arr = array('name'=>'conquer',
    		'data'=>array(
    			'title'=>'admin',
    			'uid'=>'123456',
    			'typeid'=>'admin',
    			'content'=>'13800138000',
    			'icon'=>'1',
    			'total' =>20,
    			'token' =>'abc123'
    			)
    		);
    	/**集体攻关****/

    	echo json_encode($arr);
	}
	
}
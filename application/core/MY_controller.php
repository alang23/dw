<?php

class Api_Controller extends CI_Controller
{
	

	public function __construct()
	{
		parent::__construct();
	}


	//取得前端post过来的数据
    public function requestData()
    {
    	$data = file_get_contents('php://input');
   		$jsonObject = json_decode($data,true);
   		
   		return $jsonObject;
    }

    //统一返回

    public function responseData($data)
    {
    	echo json_encode($data);
    }


}
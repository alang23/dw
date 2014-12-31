<?php

class Userinfo extends Api_Controller
{
	

	
	public function __construct()
	{
		     
		parent::__construct();

	}

	public function index()
	{
		$data = $this->requestData();
	}



	//编辑信息
	public function edit()
	{
		$data = $this->requestData();

		$id = $data['id'];
		$config = array('id'=>$id);
		$this->load->model('member_mdl','member');
		$userinfo = $this->member->get_one_by_id($config);

		$result = array(
			'errcode'=>0,
			'errmsg'=>'ok',
			'data'=>$userinfo
			);
		$this->responseData($result);
	}

	//更新信息
	public function update()
	{
		$id = $this->data['id'];
		$data['username'] = $username;
        $data['realname'] = $realname;
        $data['mobile'] = $mobile;
        $data['check_mobile'] = $check_mobile;
        $data['depid'] = $depid;
        $data['roleid'] = $roleid;
        $data['profession'] = $profession;
        $data['industry'] = $industry;
        $data['content'] = $content;
        $data['enabled'] = $content;
        $this->load->model('member_mdl','member');

        $config = array('id'=>$id);
        $userinfo = $this->member->update($config,$data);

        $result = array('errcode'=>0,'errmsg'=>'ok');
        $this->responseData($result);


	}
}
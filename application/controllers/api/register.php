<?php
/**
*@DEC 注册接口
*/


class Register extends Api_Controller
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_mdl','member');
	}


	public function index()
	{
	
		$data = $this->requestData();
		$mdata['username'] = $data['username'];
        $mdata['realname'] = $data['realname'];
        $mdata['passwd'] = $data['passwd'];
        $mdata['mobile']= $data['mobile'];
        $mdata['check_mobile'] = $data['check_mobile'];
        $mdata['depid'] = $data['depid'];
        $mdata['roleid'] = $data['roleid'];
        $mdata['profession'] = $data['profession'];
        $mdata['industry'] = $data['industry'];
        $mdata['createtime'] = time();
        $mdata['token'] = md5(time());

        //check username
        $checkusername = $this->checkUsername($data);
        if($checkusername['errcode']){

        	$this->responseData($checkusername);
        	exit;
        }
       
        if($this->member->add($mdata)){
        	$result = array('errcode'=>0,'errmsg'=>'ok');
        }

        $this->responseData($result);

	}
	
	//检查用户名
	private function checkUsername($data)
	{
		$config = array('username'=>$data['username']);
		$info = $this->member->get_one_by_id($config);

		if(!empty($info)){
			$result['errcode'] = 1;
			$result['errmsg'] = '用户名已存在';
		}

		return $result;
	}
}
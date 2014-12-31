<?php

class Conquer extends Api_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('conquer_mdl','conquer');
	}


	public function index()
	{

	}

	/**
	*@创建-集体攻关
	*/

	public function create()
	{
		$data = $this->requestData();

		$mdata['title'] = $data['data']['title'];
		$mdata['uid'] = $data['data']['uid'];
		$mdata['typeid'] = $data['data']['typeid'];
		$mdata['content'] = $data['data']['content'];
		$mdata['total'] = $data['data']['total'];
		$mdata['createtime'] = time();
		if($this->conquer->add($mdata)){
			$result = array('errcode'=>0,'errmsg'=>'ok');
		}else{
			$result = array('errcode'=>-1,'errmsg'=>'error');
		}


		$this->responseData($data);
	}

	/**
	*
	*@集体攻关类型
	*/
	public function getType()
	{

	}



	/**
	*专家总结
	**/

	public function summary()
	{
		$data = $this->requestData();

		$id = $data['data']['id'];
		$uid = $data['data']['uid'];

		$content = $data['data']['content'];
		$mdata['summary'] = $content;
		$mdata['endtime'] = time();

		//更新
		if(!empty($content)){
			$config = array('uid'=>$uid,'id'=>$id);
			$this->conquer->update($config,$mdata);
			$result = array('errcode'=>0,'errmsg'=>'ok');
		}else{
			$result = array('errcode'=>-1,'errmsg'=>'总结内容为空');
		}

		$this->responseData($data);

	}

	/**
	* 员工解答
	*/
	public function reply()
	{
		$data = $this->requestData();

		$mid = $data['data']['mid'];
		$cid = $data['data']['cid'];
		$content = $data['data']['content'];


		/**录入**/
		if(!empty($uid) && !empty($id) && !empty($content)){
			$mdata['cid'] = $cid;
			$mdata['mid'] = $mid;
			$mdata['content'] = $content;
			if($this->conquer_reply->add($mdata)){
				$result = array('errcode'=>0,'errmsg'=>'ok');
			}else{
				$result = array('errcode'=>-1,'errmsg'=>'操作失败，请重试');
			}
		}

		$this->responseData($data);
	}

}
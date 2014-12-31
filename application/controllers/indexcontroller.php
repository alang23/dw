<?php


class Indexcontroller extends Base_Controller{
	
	public function __construct(){
		parent::__construct();
	}


	public function index(){
		
		$data['nav'] = 'index';
		$this->load->model('banner_mdl','banner');
		$banner = $this->banner->getList(array());
		$data['banner'] = $banner;		
		//推荐
		$this->load->model('products_mdl','products');
        $tjwhere['where'] = array('index'=>1);
        $tjlist = $this->products->getList($tjwhere);               
        $data['tjlist'] = $tjlist;

		$this->load->view('index',$data);
		
	}
}
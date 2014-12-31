<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-29
 * Time: 上午10:46
 */

class Index extends Admin_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['userinfo'] = $this->userinfo;
        $this->load->view('home/home_index',$data);
    }


}
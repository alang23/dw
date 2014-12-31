<?php

class Member extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_mdl','member');
	}

    //会员列表
	public function index()
	{
	    $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $roleid = isset($_GET['roleid']) ? intval($_GET['roleid']) : 0;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = ''; 
        $where = array();
        if(!empty($roleid)){
            $where = array('roleid'=>$roleid);
            $wherelist['where'] = array('m.roleid'=>$roleid);
        }

        $count = $this->member->get_count($where);
       
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php?d=home&c=member';
        $config['total_rows'] = $count;
        //设置url上第几段用于传递分页器的偏移量
        $config ['uri_segment'] = 4;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $list = array();
        $wherelist['page'] = true;
        $wherelist['limit'] = $limit;
        $wherelist['offset'] = $offset;
        $list = $this->member->getList($wherelist);
        $data['list'] = $list;


	   $this->load->view('home/home_member',$data);
	}

    public function add()
    {
        if(!empty($_POST)){
            $username = $this->input->post('username');
            $realname = $this->input->post('realname');
            $passwd = $this->input->post('passwd');
            $mobile = $this->input->post('mobile');
            $check_mobile = $this->input->post('check_mobile');
            $depid = $this->input->post('depid');
            $roleid = $this->input->post('roleid');
            $profession = $this->input->post('profession');
            $industry = $this->input->post('industry');
            $content = $this->input->post('content');
            $enabled = $this->input->post('enabled');
            $id = isset($_POST['id']) ? $this->input->post('id') : '0';

            if(!empty($username) && !empty($mobile) && !empty($check_mobile) && !empty($roleid)){
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
                /**图片上传**/
                if(!empty($_FILES['userfile']['name'])){
                    $config['upload_path'] = FCPATH.'/uploads/header/';
                    $config['allowed_types'] = '*';
                    $config['file_name']  =date("YmdHis");
                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('userfile')){
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                    }else{
                        $dataupload = array('upload_data' => $this->upload->data());
                        $picname = $dataupload['upload_data']['orig_name'];
                        $data['headerurl'] = $picname;
                    }

                }
                if($id){
                    $config = array('id'=>$id);
                    if(!empty($passwd)){
                        $data['passwd'] = md5($passwd);
                    }
                    $this->member->update($config,$data);
                }else{
                    if(!empty($passwd)){
                        $data['passwd'] = md5($passwd);
                        $data['createtime'] = time();
                        $this->member->add($data);
                    }                 
                }
                redirect('d=home&c=member');
            }

        }else{ 
            $this->load->model('department_mdl','dep');
            $dep = $this->dep->getList();
            $data['dep'] = $dep;

            $this->load->view('home/home_member_add',$data);
        }
    }

    /**
    *修改
    */
    public function update()
    {
        $id = $this->input->get('id');
        $where = array('id'=>$id);
        $info =  $this->member->get_one_by_id($where);
        $data['info'] = $info;

        $this->load->model('department_mdl','dep');
        $dep = $this->dep->getList();
        $data['dep'] = $dep;

        $this->load->view('home/home_member_update',$data);

    }

		//delete
	public function del()
    {
		$id = $this->input->get('id');
		$where['id'] = $id;
		$this->member->del($where);
		redirect('d=home&c=member');
	}
}
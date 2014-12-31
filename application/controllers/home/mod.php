<?php

class Mod extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_mdl','mod');
	}

    //会员列表
	public function index()
	{
	    $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $pid = isset($_GET['pid']) ? $_GET['pid'] : 0;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = ''; 
       
        $where = !empty($pid) ? array('pid'=>$pid) : array();
        $count = $this->mod->get_count($where);

        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php?d=home&c=mod';
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
        $wherelist['where'] = $where;
        $list = $this->mod->getList($wherelist);
        $data['list'] = $list;


	   $this->load->view('home/home_mod',$data);
	}

    public function add()
    {
        if(!empty($_POST)){
            $data['m_name'] = $this->input->post('m_name');
            $data['pid'] = $this->input->post('pid');
            $data['rank'] = $this->input->post('rank');

            $id = isset($_POST['id']) ? $this->input->post('id') : '0';

            if($id){
                $config = array('id'=>$id);
                $this->mod->update($config,$data);
            }else{
                           
                $this->mod->add($data);
            }

            redirect('d=home&c=mod&pid='.$data['pid']);
        }else{ 
            $this->load->model('project_mdl','project');
            $project = $this->project->getList();
            $data['project'] = $project;
            //部门

            $this->load->view('home/home_mod_add',$data);
        }
    }

    /**
    *修改
    */
    public function update()
    {
        $id = $this->input->get('id');
        $where = array('id'=>$id);
        $info =  $this->mod->get_one_by_id($where);
        $data['info'] = $info;

                    //部门
        $this->load->model('project_mdl','project');
        $project = $this->project->getList();
        $data['project'] = $project;

        $this->load->view('home/home_mod_update',$data);

    }

		//delete
	public function del()
    {
		$id = $this->input->get('id');
		$pid = $this->input->get('pid');
		$where['id'] = $id;
		$this->mod->del($where);
		redirect('d=home&c=mod&pid='.$pid);
	}
}
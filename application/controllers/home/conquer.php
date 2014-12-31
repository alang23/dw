<?php

class Conquer extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Conquer_mdl','conquer');
	}

    //会员列表
	public function index()
	{
	    $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = ''; 

        $count = $this->conquer->get_count();
       
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php?d=home&c=conquer';
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
        $list = $this->conquer->getList($wherelist);
        $data['list'] = $list;


	   $this->load->view('home/home_conquer',$data);
	}

    public function add()
    {
        if(!empty($_POST)){
            $data['t_name'] = $this->input->post('t_name');
            $data['t_type'] = $this->input->post('t_type');
            $data['t_days'] = $this->input->post('t_days');
            $data['t_depid'] = $this->input->post('t_depid');
            $data['t_degree'] = $this->input->post('t_degree');
            $data['t_cost'] = $this->input->post('t_cost');
            $data['status'] = $this->input->post('status');
            $data['t_content'] = $this->input->post('t_content');

            $id = isset($_POST['id']) ? $this->input->post('id') : '0';

            if($id){
                $config = array('id'=>$id);
                $this->project->update($config,$data);
            }else{
               
                $data['createtime'] = time();
                $this->project->add($data);
            }

            redirect('d=home&c=project');
        }else{ 
            $this->load->model('project_type_mdl','type');
            $type = $this->type->getList();
            $data['type'] = $type;
            //部门
            $this->load->model('department_mdl','department');
            $dep = $this->department->getList();
            $data['dep'] = $dep;

            $this->load->view('home/home_project_add',$data);
        }
    }

    /**
    *修改
    */
    public function update()
    {
        $id = $this->input->get('id');
        $where = array('id'=>$id);
        $info =  $this->project->get_one_by_id($where);
        $data['info'] = $info;

        $this->load->model('project_type_mdl','dep');
        $type = $this->dep->getList();
        $data['type'] = $type;

                    //部门
        $this->load->model('department_mdl','department');
        $dep = $this->department->getList();
        $data['dep'] = $dep;

        $this->load->view('home/home_project_update',$data);

    }

		//delete
	public function del()
    {
		$id = $this->input->get('id');
		$where['id'] = $id;
		$this->project->del($where);
		redirect('d=home&c=project');
	}
}
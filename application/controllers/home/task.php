<?php

class Task extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('task_mdl','task');
	}

    //会员列表
	public function index()
	{
	    $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $mid = isset($_GET['mid']) ? $_GET['mid'] : 0;
      
        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = ''; 

        $where = !empty($mid) ? array('mid'=>$mid) : array();
        $count = $this->task->get_count($where);
       
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php?d=home&c=task';
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
        $list = $this->task->getList($wherelist);
        $data['list'] = $list;


	   $this->load->view('home/home_task',$data);
	}

    public function add()
    {
        if(!empty($_POST)){
            $data['t_name'] = $this->input->post('t_name');
            $data['t_type'] = $this->input->post('t_type');
            $data['t_days'] = $this->input->post('t_days');
            $data['t_degree'] = $this->input->post('t_degree');
            $data['t_cost'] = $this->input->post('t_cost');
            $data['status'] = $this->input->post('status');
            $data['t_content'] = $this->input->post('t_content');

            $id = isset($_POST['id']) ? $this->input->post('id') : '0';

            if($id){
                $config = array('id'=>$id);
                $this->task->update($config,$data);
            }else{
               
                $data['createtime'] = time();
                $this->task->add($data);
            }

            redirect('d=home&c=task');
        }else{ 
            $this->load->model('task_type_mdl','type');
            $type = $this->type->getList();
            $data['type'] = $type;

            $this->load->view('home/home_task_add',$data);
        }
    }

    /**
    *修改
    */
    public function update()
    {
        $id = $this->input->get('id');
        $where = array('id'=>$id);
        $info =  $this->task->get_one_by_id($where);
        $data['info'] = $info;

        $this->load->model('task_type_mdl','dep');
        $type = $this->dep->getList();
        $data['type'] = $type;

        $this->load->view('home/home_task_update',$data);

    }

		//delete
	public function del()
    {
		$id = $this->input->get('id');
		$where['id'] = $id;
		$this->task->del($where);
		redirect('d=home&c=task');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subscribers extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Subscribers_model');
        $this->load->model('Category_model');        
    }
	
    function Auth() {
        return $loginSession = $this->session->userdata('session_user_type');
    }
	
    function index(){ $this->load(); }
    function load($rowno=0) {
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['categories']= $this->Category_model->load_categories();
            $data['users'] = $this->Subscribers_model->load($rowno, $rowperpage);
            $allcount = $this->Subscribers_model->load_count();
            
            // Pagination Configuration
            $config['base_url'] = base_url().'Subscribers/load';
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;

            // Initialize
            $config['num_tag_open'] = '<li>'; 
            $config['num_tag_close'] = '</li>'; 
            $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="javascript:void(0);">'; 
            $config['cur_tag_close'] = '</a></li>'; 
            $config['next_link'] = 'Next'; 
            $config['prev_link'] = 'Previous'; 
            $config['next_tag_open'] = '<li class="paginate_button page-item pg-next">'; 
            $config['next_tag_close'] = '</li>'; 
            $config['prev_tag_open'] = '<li class="paginate_button page-item pg-prev">'; 
            $config['prev_tag_close'] = '</li>'; 
            $config['first_tag_open'] = '<li>'; 
            $config['first_tag_close'] = '</li>'; 
            $config['last_tag_open'] = '<li class="paginate_button page-item pg-next">'; 
            $config['last_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['row'] = $rowno;
            $this->load->view('subscribers', $data);

        }
		else {
            $this->load->view('login');
        }
    }

    function delete_db(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $id = $this->input->post('id');
            $this->Subscribers_model->delete_db($id);
        }
        else {
            $this->load->view('login');
        }
    }


    function send_email(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $category = $this->input->post('category');
            $message = $this->input->post('message');
            $this->Subscribers_model->send_email($category, $message);
        }
        else {
            $this->load->view('login');
        }
    }

    function send_email_user(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $subscriber_id = $this->input->post('subscriber_id');
            $message = $this->input->post('message');
            $this->Subscribers_model->send_email_user($subscriber_id, $message);
        }
        else {
            $this->load->view('login');
        }
    }



    function subscriberes(){ $this->load_subscriberes(); }
    function load_subscriberes($rowno=0) {
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['subscriberes'] = $this->Subscribers_model->load_subscriberes($rowno, $rowperpage);
            $allcount = $this->Subscribers_model->load_subscriberes_count();
            
            // Pagination Configuration
            $config['base_url'] = base_url().'Subscribers/load_subscriberes';
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;

            // Initialize
            $config['num_tag_open'] = '<li>'; 
            $config['num_tag_close'] = '</li>'; 
            $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="javascript:void(0);">'; 
            $config['cur_tag_close'] = '</a></li>'; 
            $config['next_link'] = 'Next'; 
            $config['prev_link'] = 'Previous'; 
            $config['next_tag_open'] = '<li class="paginate_button page-item pg-next">'; 
            $config['next_tag_close'] = '</li>'; 
            $config['prev_tag_open'] = '<li class="paginate_button page-item pg-prev">'; 
            $config['prev_tag_close'] = '</li>'; 
            $config['first_tag_open'] = '<li>'; 
            $config['first_tag_close'] = '</li>'; 
            $config['last_tag_open'] = '<li class="paginate_button page-item pg-next">'; 
            $config['last_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['row'] = $rowno;
            $this->load->view('subscribers_email', $data);

        }
        else {
            $this->load->view('login');
        }
    }

    function viewEmail($id){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $data['data'] = $this->Subscribers_model->viewEmail($id);
            $this->load->view('email_view', $data);
        }
        else { $this->load->view('login'); }
    }

}


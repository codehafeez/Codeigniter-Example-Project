<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Category_model'); 
        $this->load->model('News_model'); 
    }
	
    function Auth() {
        return $loginSession = $this->session->userdata('session_user_type');
    }
	
    function index(){ $this->news(); }
    function news($rowno=0) {
        if($this->Auth() != ""){
            $data['notification']= $this->User_model->notification();
            $data['categories']= $this->Category_model->load_categories();
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['news'] = $this->News_model->load_news($rowno, $rowperpage);
            $allcount = $this->News_model->load_news_count();
            
            // Pagination Configuration
            $config['base_url'] = base_url().'User/news';
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

            if($this->Auth() == "admin"){
                $this->load->view('dashboard_admin', $data);
            }
            else if($this->Auth() == "user"){
                // $this->load->view('dashboard', $data);
                $this->load->view('dashboard_admin', $data);
            }

        }
		else {
            $this->load->view('login');
        }
    }
	

    function filter(){
        $id = $this->input->post('filter_category');
        $this->filter_news($id);
    }

    function filter_news($id, $rowno=0) {
        if($this->Auth() != ""){
            $data['categories']= $this->Category_model->load_categories();
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['news'] = $this->News_model->filter_news($id, $rowno, $rowperpage);
            $allcount = $this->News_model->filter_news_count($id);
            
            // Pagination Configuration
            $config['base_url'] = base_url().'User/filter_news';
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
            $data['selected_category'] = $id;
            $this->load->view('dashboard_admin', $data);



        }
        else {
            $this->load->view('login');
        }
    }

    function signup(){
        if($this->Auth() != ""){ $this->index(); }
        else { $this->load->view('register'); }
    }

    function forgotPassword(){
        if($this->Auth() != ""){ $this->index(); }
        else { $this->load->view('forgot-password'); }
    }

    function register_db(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->User_model->register_db($name, $email, $password);
    }
    
    function login_db(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->User_model->login_db($email, $password);
    }    

    function forgotpassword_db(){
        $email = $this->input->post('email');
        $this->User_model->forgotpassword_db($email);
    }        

    function settings(){
        if($this->Auth() != ""){
            $this->load->view('user');
        }
        else {
            $this->load->view('login');
        }
    }        









    function categories($rowno=0) {
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }


            $data['categories'] = $this->Category_model->categories($rowno, $rowperpage);
            $data['load_categories'] = $data['categories'];
            $allcount = $this->Category_model->categories_count();

            
            // Pagination Configuration
            $config['base_url'] = base_url().'User/categories';
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


            $this->load->view('categories', $data);
        }
        else {
            $this->load->view('login');
        }
    }


    function filter_cat($rowno=0) {
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $id = $this->input->post('filter_category');


            $rowperpage = 100;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['categories'] = $this->Category_model->categories($rowno, $rowperpage);
            $data['pagination'] = "";


            if($id == 0){

                redirect(base_url('User/categories')); 

            } else {
                $data['load_categories'] = $this->Category_model->filter_cat($id);
                $data['selected_category'] = $id;
                $this->load->view('categories', $data);
            }

        }
        else {
            $this->load->view('login');
        }
    }





    function all_users($rowno=0) {
        if($this->Auth() != "" && $this->Auth() == "admin"){


            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['users'] = $this->User_model->all_users($rowno, $rowperpage);
            $allcount = $this->User_model->all_users_count();
            
            // Pagination Configuration
            $config['base_url'] = base_url('User/all_users');
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
            $this->load->view('users', $data);


        }
        else {
            $this->load->view('login');
        }
    }






    function all_emails(){ $this->load_all_emails(); }
    function load_all_emails($rowno=0) {
        if($this->Auth() != ""){
            $rowperpage = 5;
            if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
            $data['emails_data'] = $this->User_model->load_all_emails($rowno, $rowperpage);
            $allcount = $this->User_model->load_all_emails_count();
            
            // Pagination Configuration
            $config['base_url'] = base_url('User/load_all_emails');
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
            $this->load->view('all_emails', $data);

        }
        else { $this->load->view('login'); }
    }


    function viewEmail($id){
        if($this->Auth() != ""){
            $data['data'] = $this->User_model->viewEmail($id);
            $this->load->view('email_view_user', $data);
        }
        else { $this->load->view('login'); }
    }












    function change_user_name(){
        if($this->Auth() != ""){
            $name = $this->input->post('name');
            $this->User_model->change_user_name($name);
        }
        else {
            $this->load->view('login');
        }
    }

    function change_user_password(){
        if($this->Auth() != ""){
            $password = $this->input->post('password');
            $this->User_model->change_user_password($password);
        }
        else {
            $this->load->view('login');
        }
    }

    function delete_user(){
        if($this->Auth() != ""){
            $id = $this->input->post('id');
            $this->User_model->delete_user($id);
        }
        else {
            $this->load->view('login');
        }
    }

    function update_profile(){
        if($this->Auth() != ""){
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $this->User_model->update_profile($id, $name, $password);
        }
        else {
            $this->load->view('login');
        }
    }







    function send_email(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $message = $this->input->post('message');
            $this->User_model->send_email($message);
        }
        else {
            $this->load->view('login');
        }
    }

    function send_email_user(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $user_id = $this->input->post('user_id');
            $message = $this->input->post('message');
            $this->User_model->send_email_user($user_id, $message);
        }
        else {
            $this->load->view('login');
        }
    }

    function send_email_admin(){
        if($this->Auth() != ""){
            $message = $this->input->post('message');
            $this->User_model->send_email_admin($message);
        }
        else {
            $this->load->view('login');
        }
    }


    function clear_notification(){
        $this->User_model->clear_notification();
    }


    function ads(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $data['ads'] = $this->User_model->ads();
            $this->load->view('ads', $data);
        }
        else {
            $this->load->view('login');
        }
    }

    function ad_update(){
        if($this->Auth() != "" && $this->Auth() == "admin"){

            $img = $_FILES['file']['name']; 
            if(strlen($img) > 1){ move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$img); }
            else { $img = 'default-image.jpg'; }

            $id = $this->input->post('id');
            $data = array('ad_image' => $img);      
            $this->User_model->ad_update($data, $id);
        }
        else { $this->load->view('login'); }        
    }

}


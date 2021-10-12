<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
    }
	
    function Auth() {
        return $loginSession = $this->session->userdata('session_user_type');
    }
	
    function new_category(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $name = $this->input->post('name');
            $this->Category_model->new_category($name);
        }
        else {
            $this->load->view('register');
        }
    }

    function update_category(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $this->Category_model->update_category($id, $name);
        }
        else {
            $this->load->view('register');
        }
    }

    function delete_category(){
        if($this->Auth() != "" && $this->Auth() == "admin"){
            $id = $this->input->post('id');
            $this->Category_model->delete_category($id);
        }
        else {
            $this->load->view('register');
        }
    }


}


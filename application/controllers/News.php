<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Category_model');
    }
	
    function Auth() {
        return $loginSession = $this->session->userdata('session_user_type');
    }

    function add_news(){
        if($this->Auth() != ""){

            $img = $_FILES['file']['name']; 
            if(strlen($img) > 1){ move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$img); }
            else { $img = 'default-image.jpg'; }

            $user_id = $this->session->userdata('session_user_id');
            $input_value1 = $this->input->post('input_value1');
            $input_value2 = $this->input->post('input_value2');
            $input_value3 = $this->input->post('input_value3');
            $news_txt = $this->input->post('news_txt');

            $data = array(
                'news_img' => $img,
                'news_value1' => $input_value1,
                'news_value2' => $input_value2,
                'news_value3' => $input_value3,
                'news_txt' => $news_txt,
                'user_id_fk' => $user_id,
            );      
            $this->News_model->add_news($data);
        }
        else { $this->load->view('login'); }
    }

    function delete_news(){
        if($this->Auth() != ""){
            $id = $this->input->post('id');
            $this->News_model->delete_news($id);
        }
        else { $this->load->view('login'); }
    }

    function edit_news($id){
        if($this->Auth() != ""){
            $data['categories']= $this->Category_model->load_categories();
            $data['news']= $this->News_model->edit_news($id);
            $this->load->view('news_edit', $data);
        }
        else { $this->load->view('login'); }
    }

    function update_news(){
        if($this->Auth() != ""){

            $id = $this->input->post('id');
            $input_value1 = $this->input->post('input_value1');
            $input_value2 = $this->input->post('input_value2');
            $input_value3 = $this->input->post('input_value3');
            $news_txt = $this->input->post('news_txt');

            $img = $_FILES['file']['name']; 
            if(strlen($img) > 1)
            {
                move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$img);
                $data = array(
                    'news_img' => $img,
                    'news_value1' => $input_value1,
                    'news_value2' => $input_value2,
                    'news_value3' => $input_value3,
                    'news_txt' => $news_txt,
                );      
                $this->News_model->update_news($data, $id);
            }
            else 
            {
                $data = array(
                    'news_value1' => $input_value1,
                    'news_value2' => $input_value2,
                    'news_value3' => $input_value3,
                    'news_txt' => $news_txt,
                );      
                $this->News_model->update_news($data, $id);
            }
        }
        else { $this->load->view('login'); }
    }
}


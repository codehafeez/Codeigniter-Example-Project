<?php
class News_model extends CI_Model {


    function add_news($data){
      $this->db->insert('news', $data);
      echo "success";
    }


    function load_news($rowno, $rowperpage){
        $user_id = $this->session->userdata('session_user_id');
        $user_type = $this->session->userdata('session_user_type');
        $sql = "";
        if($user_type == 'admin') {
          $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id LIMIT $rowno, $rowperpage";
        }
        else {
          $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id." LIMIT $rowno, $rowperpage";
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function load_news_count(){
        $user_id = $this->session->userdata('session_user_id');
        $user_type = $this->session->userdata('session_user_type');
        $sql = "";
        if($user_type == 'admin') {
          $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id";
        }
        else {
          $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id;
        }

        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }










    function filter_news($id, $rowno, $rowperpage){
        $user_id = $this->session->userdata('session_user_id');
        $user_type = $this->session->userdata('session_user_type');
        $sql = "";
        if($user_type == 'admin') {
          if($id == 0){
            $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id LIMIT $rowno, $rowperpage";
          } else {
            $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE news_value3 = ".$id." LIMIT $rowno, $rowperpage";
          }
        }
        else {
          if($id == 0){
            $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id." LIMIT $rowno, $rowperpage";
          }
          else {
            $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id." AND news_value3 = ".$id." LIMIT $rowno, $rowperpage";
          }
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function filter_news_count($id){
        $user_id = $this->session->userdata('session_user_id');
        $user_type = $this->session->userdata('session_user_type');
        $sql = "";
        if($user_type == 'admin') {
          if($id == 0){
            $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id";
          } else {
            $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE news_value3=".$id;
          }
        }
        else {
          if($id == 0){
            $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id;
          } else {
            $sql = "SELECT count(*) as allcount FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE user_id_fk = ".$user_id." AND news_value3=".$id;
          }
        }

        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }






    function delete_news($id){
        $this->db->where('news_id', $id);
        $this->db->delete('news');
        echo "success";
    }

    function edit_news($id){
        $sql = "SELECT * FROM news INNER JOIN categories ON news.news_value3 = categories.category_id WHERE news_id = ".$id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function update_news($data, $id){
      $this->db->where('news_id', $id);
      $this->db->update('news', $data);
      echo "success";
    }

}
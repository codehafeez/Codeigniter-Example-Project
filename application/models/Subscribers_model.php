<?php
class Subscribers_model extends CI_Model {


    function load($rowno, $rowperpage){
        $sql = "SELECT * FROM user_subscribes_categories INNER JOIN categories on user_subscribes_categories.category_id_fk = categories.category_id LIMIT $rowno, $rowperpage";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
    function load_count(){
        $sql = "SELECT count(*) as allcount FROM user_subscribes_categories INNER JOIN categories on user_subscribes_categories.category_id_fk = categories.category_id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }


    function delete_db($id){
        $this->db->where('subscribe_id', $id);
        $this->db->delete('user_subscribes_categories');
        echo "success";
    }










    


    function send_email($category_id, $message){
        $sql = "SELECT * FROM user_subscribes_categories WHERE category_id_fk = ".$category_id;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row){
            $this->sendEmail_msg($row->subscribe_email, $row->subscribe_id, $category_id, $message);
        }
        echo "Emaili send successfully.";
    }

    function sendEmail_msg($email, $subscribe_id, $cat_id, $message){
        // $to = $email;
        // $subject = "Groupo Centro - Subscriber";
        // $header = "From: codehafeez@gmail.com";
        // if(mail($to, $subject, $message, $header)){ $this->sendEmail_insert($subscribe_id, $cat_id, $message); }
        // else { echo 'Error : Can not send mail'; }

        $this->sendEmail_insert($subscribe_id, $cat_id, $message);
    }

    function sendEmail_insert($subscribe_id, $cat_id, $message){
        $data = array(
            'subscribe_id' => $subscribe_id,
            'category_id' => $cat_id,
            'message' => $message,
        );      
        $this->db->insert('send_emails_subscribes', $data);
    }

    function send_email_user($subscribe_id, $message){
        $sql = "SELECT * FROM user_subscribes_categories WHERE subscribe_id = ".$subscribe_id;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row){
            $this->sendEmail_msg($row->subscribe_email, $subscribe_id, $row->category_id_fk, $message);
        }
        echo "Emaili send successfully.";
    }










    function load_subscriberes($rowno, $rowperpage){
        $sql = "SELECT * FROM send_emails_subscribes INNER JOIN user_subscribes_categories on send_emails_subscribes.subscribe_id = user_subscribes_categories.subscribe_id INNER JOIN categories on send_emails_subscribes.category_id = categories.category_id LIMIT $rowno, $rowperpage";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
    function load_subscriberes_count(){
        $sql = "SELECT count(*) as allcount FROM send_emails_subscribes INNER JOIN user_subscribes_categories on send_emails_subscribes.subscribe_id = user_subscribes_categories.subscribe_id INNER JOIN categories on send_emails_subscribes.category_id = categories.category_id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }

    function viewEmail($id){
        $sql = "SELECT * FROM send_emails_subscribes INNER JOIN user_subscribes_categories on send_emails_subscribes.subscribe_id = user_subscribes_categories.subscribe_id INNER JOIN categories on send_emails_subscribes.category_id = categories.category_id WHERE id=".$id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
<?php
class User_model extends CI_Model {

  function register_db($name, $email, $password){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('user_email', $email);
      $query = $this->db->get();
      if ($query->num_rows() > 0) { echo 'Sorry this email is already exist.'; }
      else { $this->register_db_success($name, $email, $password); }      
  }

  function register_db_success($name, $email, $password){
      $data = array(
        'user_name' => $name,
        'user_email' => $email,
        'user_password' => base64_encode($password)
      );      
      $this->db->insert('users', $data);
      $insert_id = $this->db->insert_id();

          $this->session->set_userdata('session_user_id', $insert_id);
          $this->session->set_userdata('session_user_name', $name);
          $this->session->set_userdata('session_user_email', $email);
          $this->session->set_userdata('session_user_type', 'user');
          echo 'success';
  }

    function login_db($email, $password)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('user_email', $email);
      $this->db->where('user_password', base64_encode($password));
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() > 0) { 
        foreach ($query->result() as $row){
          $this->session->set_userdata('session_user_id', $row->user_id);
          $this->session->set_userdata('session_user_name', $row->user_name);
          $this->session->set_userdata('session_user_email', $row->user_email);
          $this->session->set_userdata('session_user_type', $row->user_type);
          echo 'success';
        }
      }
      else { echo 'Sorry email or password incorrect.'; }
    }    


    function forgotpassword_db($email){
        $this->db->select('user_email, user_password');
        $this->db->from('users');
        $this->db->where('user_email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            foreach ($query->result() as $row){
                $password = base64_decode($row->user_password);
                $to = $email;
                $subject = "Groupo Centro";
                $message = "Groupo Centro = Login password is : ".$password;
                $header = "From: codehafeez@gmail.com";
                if(mail($to, $subject, $message, $header)){ echo "Password send to your email, please check your email."; }
                else { echo 'Error : Can not send mail'; }
            }
        }
        else { echo "Sorry email not found, please enter a valid email."; }
    }





    function all_users($rowno, $rowperpage){
        $sql = "SELECT * FROM users WHERE user_type='user' LIMIT $rowno, $rowperpage";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
    function all_users_count(){
        $sql = "SELECT count(*) as allcount FROM users WHERE user_type='user'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }




    function load_all_emails($rowno, $rowperpage){
        $current_login_id = $this->session->userdata('session_user_id');
        if($current_login_id == 1){ // admin id
          $sql = "SELECT * FROM users INNER JOIN send_emails_users ON users.user_id = send_emails_users.sender_id_fk LIMIT $rowno, $rowperpage";
          $query = $this->db->query($sql);
          return $query->result_array();
      }
        else {
          $sql = "SELECT * FROM users INNER JOIN send_emails_users ON users.user_id = send_emails_users.user_id_fk WHERE (user_id_fk=$current_login_id AND sender_id_fk=1) OR (sender_id_fk=$current_login_id AND user_id_fk=1) LIMIT $rowno, $rowperpage";
          $query = $this->db->query($sql);
          return $query->result_array();
        }
    }

    function load_all_emails_count(){
        $current_login_id = $this->session->userdata('session_user_id');
        $sql = "SELECT count(*) as allcount FROM users INNER JOIN send_emails_users ON users.user_id = send_emails_users.user_id_fk WHERE (user_id_fk=$current_login_id AND sender_id_fk=1) OR (sender_id_fk=$current_login_id AND user_id_fk=1)";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }

    function viewEmail($id){
        $sql = "SELECT * FROM users INNER JOIN send_emails_users ON users.user_id = send_emails_users.user_id_fk WHERE send_id=".$id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }






    function change_user_name($name){
      $data = array('user_name' => $name);      
      $this->db->where('user_id', $_SESSION["session_user_id"]);
      $this->db->update('users', $data);
      $this->session->set_userdata('session_user_name', $name);
      echo "success";
    }

    function change_user_password($password){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('user_id', $_SESSION["session_user_id"]);
      $this->db->where('user_password', base64_encode($password));
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() > 0) { $this->change_user_password_db($password); }
      else { echo 'Sorry your old password is incorrect.'; }
    }

    function change_user_password_db($password){
      $data = array('user_password' => base64_encode($password));      
      $this->db->where('user_id', $_SESSION["session_user_id"]);
      $this->db->update('users', $data);
      echo 'Password successfully updated.';      
    }

    function delete_user($id){
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        echo "success";
    }

    function update_profile($id, $name, $password){
        $data = array(
            'user_name' => $name,
            'user_password' => base64_encode($password)
        );      
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
        echo "success";
    }


















    function send_email_admin($message){
        // $current_login_email = $this->session->userdata('session_user_email');
        // $to = "codehafeez@gmail.com";
        // $subject = "Groupo Centro - User Email";
        // $header = "From: ".$current_login_email;
        // if(mail($to, $subject, $message, $header)){ $this->sendEmail_insert(1, $message); }
        // else { echo 'Error : Can not send mail'; }

        $this->sendEmail_insert(1, $message); // defult admin id = 1
        echo "Emaili send successfully.";
    }

    


    function send_email($message){
        $sql = "SELECT * FROM users WHERE user_type = 'user'";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row){
            $this->sendEmail_msg($row->user_email, $row->user_id, $message);
        }
        echo "Emaili send successfully.";
    }

    function send_email_user($user_id, $message){
        $sql = "SELECT * FROM users WHERE user_id = ".$user_id;
        $query = $this->db->query($sql);
        foreach ($query->result() as $row){
            $this->sendEmail_msg($row->user_email, $user_id, $message);
        }
        echo "Emaili send successfully.";
    }

    function sendEmail_msg($email, $user_id, $message){
        // $to = $email;
        // $subject = "Groupo Centro - Subscriber";
        // $header = "From: codehafeez@gmail.com";
        // if(mail($to, $subject, $message, $header)){ $this->sendEmail_insert($user_id, $message); }
        // else { echo 'Error : Can not send mail'; }
        $this->sendEmail_insert($user_id, $message);
    }

    function sendEmail_insert($user_id, $message){
        $current_login_id = $this->session->userdata('session_user_id');
        $data = array(
            'sender_id_fk' => $current_login_id,
            'user_id_fk' => $user_id,
            'send_msg' => $message,
        );      
        $this->db->insert('send_emails_users', $data);
        $this->notification_insert($current_login_id, $user_id);
    }

    function notification_insert($sender_id, $receiver_id){
        $send_datetime = date("Y-m-d H:i:s");
        $title = "email send by user";
        if($sender_id == 1){ $title = "email send by admin"; }
        $data = array(
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'title' => $title,
            'send_datetime' => $send_datetime,
        );      
        $this->db->insert('notifications', $data);
    }






    function notification(){
        $count = 0;
        $dataResult = "";
        $id = $this->session->userdata('session_user_id');
        $sql = "SELECT * FROM notifications WHERE receiver_id='$id' AND (send_datetime>receiver_datetime OR receiver_datetime IS NULL AND send_datetime IS NOT NULL)";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row){
          $count++;
          $dataResult .= '<a class="dropdown-item media" href="#"><p>'.$row->title.'</p></a>';
        }

        $return_data = "";
        if($count > 0){
          $dataResult .= '<button class="btn btn-primary dropdown-item media" onclick="clearNotification()"><p style="text-align:center;">Clear All</p></button>';


          $return_data = '<div class="header-left header-left-notification">
          <div class="dropdown for-notification notification_data">
          <button class="btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bell"></i><span class="count bg-danger">'.$count.'</span></button>
          <div class="dropdown-menu" aria-labelledby="notification" x-placement="bottom-start">'.$dataResult.'</div>
          </div>
          </div>';
        }

        return $return_data;
    }


    function clear_notification(){
        $receiver_datetime = date("Y-m-d H:i:s");
        $data = array('receiver_datetime' => $receiver_datetime);      
        $this->db->where('receiver_id', $_SESSION["session_user_id"]);
        $this->db->update('notifications', $data);
        echo "success";
    }


    function ads(){
        $sql = "SELECT * FROM ads";
        $query = $this->db->query($sql);
        return $query->result_array();
   }

   function ad_update($data, $id){
      $this->db->where('ad_id', $id);
      $this->db->update('ads', $data);
      echo "success";
   }

}
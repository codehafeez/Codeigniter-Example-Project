<?php
class Category_model extends CI_Model {


    function categories($rowno, $rowperpage){
        $sql = "SELECT * FROM categories LIMIT $rowno, $rowperpage";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

  function load_categories(){
        $sql = "SELECT * FROM categories";
        $query = $this->db->query($sql);
        return $query->result_array();
  }


    function categories_count(){
        $sql = "SELECT count(*) as allcount FROM categories";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['allcount'];
    }




 
    function new_category($name){
      $data = array('category_name' => $name);      
      $this->db->insert('categories', $data);
      echo "success";
    }

 

    function delete_category($id){
        $this->db->where('category_id', $id);
        $this->db->delete('categories');
        echo "success";
    }
 


    function update_category($id, $name){
      $data = array('category_name' => $name);      
      $this->db->where('category_id', $id);
      $this->db->update('categories', $data);
      echo "success";
   }

   function filter_cat($id){
      $this->db->select('*');
      $this->db->from('categories');
      $this->db->where('category_id', $id);
      $query = $this->db->get();
      return $query->result_array();
   }


}
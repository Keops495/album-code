<?php
class User_model extends CI_Model {

    function get_user_album($user_id){
        return $this->db->query("SELECT a.* FROM album AS a, user AS u WHERE a.album_user_id='".$user_id."' ")->result_array();
    }

    function get_all_users(){
        return $this->db->query("SELECT * FROM user")->result_array();
    }

    function get_user_byId($user_id){
        return $this->db->query("SELECT FROM user AS a WHERE a.user_id='".$user_id."'")->result_array();
    }

    function get_user_byUserName($user_name){
        return $this->db->query("SELECT FROM user AS a WHERE a.user_name='".$user_name."'")->result_array();
    }

    function get_user_byName($name){
        return $this->db->query("SELECT FROM user AS a WHERE a.name='".$name."'")->result_array();
    }

    function get_one_photo($album_id){
        return $this->db->query("SELECT p.photo_url FROM photograph AS p WHERE p.photo_album_id='".$album_id."' LIMIT 1")->row(0,"array");
    }

    function get_photos($album_id){
        return $this->db->query("SELECT p.* FROM photograph AS p WHERE p.photo_album_id='".$album_id."'")->result_array();
    }

    function delete_photo($photo_id){
        return $this->db->query("DELETE FROM photograph WHERE photo_id='".$photo_id."'");
    }
    
    function get_album($album_id){
        return $this->db->query("SELECT a.* FROM album AS a WHERE a.album_id='".$album_id."' ")->row(0,"array");
    }
    function add_more_album($user_id,$data){
        
        return $this->db->query("INSERT INTO album SET name=".$this->db->escape($data['Name']).", album_user_id='".$user_id."', album_date=NOW()");
        
    }
}
?>

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
    function add_more_photo($album_id,$data){
        
        return $this->db->query("INSERT INTO photograph SET photo_url=".$this->db->escape($data['Url']).", photo_album_id='".$album_id."', photo_date=NOW()");
        
    }
    function get_photo_id_from_url($data){
        
        return $this->db->query("SELECT p.photo_id FROM photograph AS p WHERE p.photo_url='".$data["Url"]."' LIMIT 1")->row(0,"array");;
        
    }
    function add_key_photo($photo_id,$data){
       
       $this->db->query("INSERT INTO keywords SET key='".$this->db->escape($data['Key'])."', keyword_photo_id='".$photo_id."'");
        
    }
     function get_key($photo_id){

        return $this->db->query("SELECT a.key FROM keywords AS a WHERE a.keyword_photo_id='".$photo_id."' LIMIT 1")->row(0,"array");
    }

    function get_photos_with_key($album_id,$data){
        return $this->db->query("SELECT p.* FROM photograph AS p, keywords AS k WHERE p.photo_album_id='".$album_id."' AND k.keyword_photo_id=p.photo_id AND k.key='".$data["Key"]."' ")->result_array();
    }

    function get_album_id_with_photo($photo_id){
        return $this->db->query("SELECT photo_album_id FROM photograph WHERE photo_id='".$photo_id."' ")->row(0,"array");
    }
}
?>

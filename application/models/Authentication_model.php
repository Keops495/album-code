<?php 
    class Authentication_model extends CI_Model {
        
        function get_pass($username){
            return $this->db->query("SELECT password FROM user WHERE user_name = '".$username."'")->row(0,"array");
        }

        function get_data($username) {
        	return $this->db->query("SELECT n_times FROM user WHERE user_name = '".$username."'")->row(0,"array");
        }

        function get_album($userid) {
        	return $this->db->query("SELECT * FROM album WHERE album_user_id = '".$userid."'")->result_array();
        }

        function get_photo($albumid) {
        	return $this->db->query("SELECT * FROM photograph WHERE photo_album_id = '".$albumid."'")->result_array();
        }

    }
?>

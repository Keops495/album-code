<?php 
    class Data_model extends CI_Model {
        
        function get_table_information(){
            return $this->db->query("SELECT * FROM message")->result_array();
        }

        function get_album_name($album_id){
            return $this->db->query("SELECT photo_url FROM album, photograph WHERE photo_id='".$album_id."' ")->result_array();
        }

        function get_name($album_id){
            return $this->db->query("SELECT name FROM user WHERE user_id='".$album_id."' ")->row(0,"array");
        }

        function get_surname($album_id){
            return $this->db->query("SELECT surname FROM user WHERE user_id='".$album_id."' ")->row(0,"array");
        }

        function n_change($id,$n) {
            $this->db->query("UPDATE user SET n_times = ".$n." WHERE user_id = '".$id."'");
        }

        function open_session($id) {
            $this->db->query("DELETE FROM sessions WHERE id = '".$id."'");
            $this->db->query("INSERT INTO sessions SET id ='".$id."'");
        }

        function get_sessions($user_id) {
            return $this->db->query("SELECT * FROM sessions WHERE id='".$user_id."'")->row(0,"array")['id'];
        }

        function close_session($id) {
            $this->db->query("DELETE FROM sessions WHERE id = '".$id."'");
        }

        function get_n($album_id){
            return $this->db->query("SELECT n_times FROM user WHERE user_id='".$album_id."' ")->row(0,"array");
        }

        function new_user($user) {
            $this->db->query("INSERT INTO user SET name = '".$user['name']."' , surname = '".$user['surname']."' , password = '".$user['Password']."' , user_name = '".$user['Username']."'");
        }

        function get_user_album($user_id){
            return $this->db->query("SELECT a.* FROM album AS a, user AS u WHERE a.album_user_id='".$user_id."' ")->result_array();
        }

        function album_search($like,$user_id) {
            return $this->db->query("SELECT * FROM album WHERE album_user_id = '".$user_id."' AND name LIKE '".$like."%'")->result_array();
        }

        function album_search2($like,$user_id) {
            return $this->db->query("SELECT * FROM album WHERE album_user_id != '".$user_id."' AND name LIKE '".$like."%'")->result_array();
        }

        function get_message($user_id) {
            $temp = $this->db->query("SELECT * FROM message WHERE message_to = '".$user_id."'")->result_array();
            for ($i=0; $i <count($temp) ; $i++) 
            {
                $temp[$i]['user'] = $this->db->query("SELECT * FROM user WHERE user_id = '".$temp[$i]["message_from"]."'")->row(0,"array");
            }
            return $temp;
        }

        function send_message($user_id,$photo,$to) {
            $this->db->query("INSERT INTO message SET message_from = '".$user_id."', message_to = '".$to."', message = '".$photo."'");
        }

        function get_all_users(){
            return $this->db->query("SELECT * FROM user")->result_array();
        }

        function get_all_albums() {
            return $this->db->query("SELECT * FROM album")->result_array();
        }

        function get_all_albums2($user_id) {
            return $this->db->query("SELECT * FROM album WHERE album_user_id != '".$user_id."'")->result_array();
        }

        function get_all_photosa() {
            return $this->db->query("SELECT * FROM photograph")->result_array();
        }

         function get_all_likes() {
            return $this->db->query("SELECT * FROM LIKES")->result_array();
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

        function get_album_photo($photo_id){
            return $this->db->query("SELECT a.* FROM photograph AS a, user AS u WHERE a.album_id='".$photo_id."' ")->result_array();
        }


        function get_all_photos($album_id){
            return $this->db->query("SELECT a.* FROM photograph AS a WHERE a.album_id='".$album_id."' ")->result_array();
        }

        function get_likes($photo_id){
            return $this->db->query("SELECT * FROM likes WHERE like_photo_id='".$photo_id."' ")->result_array();
        }

        function like_photo($user_id,$photo_id){
            $this->db->query("INSERT INTO likes SET like_photo_id='".$photo_id."', like_user_id='".$user_id."'");
        }

        function get_photo_byId($photo_id){
            return $this->db->query("SELECT FROM photograph AS a WHERE a.photo_id='".$photo_id."'")->result_array();
        }

        function get_photo_byKeyword($key){
            return $this->db->query("SELECT p.photo_url FROM photograph AS p, keyword AS k WHERE k.key='".$key."' AND k.keyword_photo_id=p.photo_id  ")->result_array();
        }

        function get_photo_byUrl($url){
            return $this->db->query("SELECT FROM photograph AS a WHERE a.photo_url='".$url."'")->result_array();
        }

        function get_one_photo($album_id) {
            return $this->db->query("SELECT p.photo_url FROM photograph AS p WHERE p.album_id='".$album_id."' LIMIT 1")->result_array();
        }

        function photo($id) {
            return $this->db->query("SELECT * FROM photograph WHERE photo_id='".$id."' LIMIT 1")->row(0,"array");
        }

    }
?>

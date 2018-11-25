<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller {

	public function likes($user_id,$photo_id){
    	$this->load->model('Data_model');
    	$data['Likes'] = $this->Data_model->get_likes($photo_id);
    	$data['user_id'] = $user_id;
    	$this->load->view("likes",$data);
  	}

  /*	public function send($user_id,$photo_id,$to){
    	$this->load->model('Data_model');
    	$photo = $this->Data_model->photo($photo_id)['photo_url'];
    	$this->Data_model->send_message($user_id,$photo,$to);
    	redirect("https://keops-web1.herokuapp.com/User/detail_album/".$this->Data_model->photo($photo_id)['photo_album_id']);
  	}*/

}


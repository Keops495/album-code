<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Share extends CI_Controller {

	public function messages($id){
    	$this->load->model('Data_model');
    	$data['messages'] = $this->Data_model->get_message($id);
    	$data['user_id'] = $id;
    	$this->load->view("message",$data);
  	}

  	public function shares($user_id,$photo_id){
    	$this->load->model('Data_model');
    	$data['users'] = $this->Data_model->get_all_users();
    	$data['user_id'] = $user_id;
    	$data['photo_id'] = $photo_id;
    	$this->load->view("user_list",$data);
  	}

  	public function send($user_id,$photo_id,$to){
    	$this->load->model('Data_model');
    	$photo = $this->Data_model->photo($photo_id);
    	$this->Data_model->send_message($user_id,$photo,$to);
    	redirect("https://keops-web1.herokuapp.com/User/detail_album/".$photo_id);
  	}

}


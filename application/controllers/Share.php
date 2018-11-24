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
    	$this->load->view("user_list");
  	}

}


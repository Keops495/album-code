<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Share extends CI_Controller {

	public function index(){
    	$this->load->model('Data_model');
    	$data['users'] = $this->Data_model->get_all_users();
    	
  	}

  	public function share($user_id,$photo_id){
    	$this->load->model('Data_model');
  	}

}


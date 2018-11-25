<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller {

	public function likes($user_id,$photo_id){
    	$this->load->model('Data_model');
    	$data['likes'] = $this->Data_model->get_likes($photo_id);
      for ($i=0; $i < count($data["likes"]) ; $i++) { 
        $data["likes"][$i]['name'] =$this->Data_model->get_name($data['likes'][$i]['like_user_id'])['name'];
        $data["likes"][$i]['surname'] =$this->Data_model->get_surname($data['likes'][$i]['like_user_id'])['surname'];
      }
    	$data['user_id'] = $user_id;
    	$this->load->view("likes",$data);
  	}

  	public function send($user_id,$photo_id){
    	$this->load->model('Data_model');
    	$this->Data_model->like_photo($user_id,$photo_id);
    	redirect("https://keops-web1.herokuapp.com/User/detail_album/".$this->Data_model->photo($photo_id)['photo_album_id']);
  	}

}


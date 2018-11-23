<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

  public function users(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_users());
  }

   public function photos(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_photos());
  }

   public function likes(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_likes());
  }

   public function albums(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_albums());
  }

}


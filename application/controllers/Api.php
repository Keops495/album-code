<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

  public function users(){
    $this->load->model('Data_model');
    echo json_encode($this->API->get_all_users());
  }

}


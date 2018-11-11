<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {
  public function index(){
    
    $this->load->view('login');
    
  }

  public function log(){
    
   print_r($this->input->post());
   die();
    
  }

}


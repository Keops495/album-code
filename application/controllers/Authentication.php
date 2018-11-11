<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {
  public function index(){
    
    if(isset($this->session->userdata['user']['user_id'])){
      //$data['subview'] = "subviews/dashboard";
      //$data['title'] = "EIB Admin - Anasayfa";  
     
      header(base_url()."User/");
    }
    else{
      $data['title'] = "BooksThatYouLove Admin - Giriş";
      if($this->input->post()){
        $this->load->model("login_model");
        $admin = $this->Login_model->getAdmin($this->input->post());
        if(empty($admin)){
          $this->session->set_flashdata('error', 'Hatalı kullanıcı adı veya şifre girdiniz.');
          header("Location: ".base_url()."Authentication");
        }
        else{
          $this->session->set_userdata('admin',$admin);
          header("Location: ".base_url());
        }
      }
      else{
        $this->load->view('layouts/login',$data);
      }
    }
  }

  public function out(){
    $this->session->sess_destroy();
    header("Location: ".base_url());
  }
}


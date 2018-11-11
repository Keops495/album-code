<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {
  public function index(){
    
    $this->load->view('login');
    
  }

  public function log(){
    
   if($this->input->post()){

    $this->load->model('User_model');


    $data["users"] = $this->User_model->get_all_users();

    foreach ($data["users"] as $user) {
      if($this->input->post()["Username"]==$user["user_name"] && $this->input->post()["Password"]==$user["password"] ){

        $data["user_id"]=$user["user_id"];
      }
    }

      if(count($data["user_id"])){
        $this->load->view('login');
      }

    redirect("User/".$data["user_id"]);

   }
   else{
    $this->load->view('login');
   }
   
    
  }

}


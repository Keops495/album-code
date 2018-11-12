<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

  
  public function index(){
    

    $this->load->view('login');
    
  }

  public function log(){
    $this->load->model('User_model');
    $this->load->model('Authentication_model');

   if($this->input->post()){

    $data["users"] = $this->User_model->get_all_users();

    foreach ($data["users"] as $user) {
      if($this->input->post()["Username"]==$user["user_name"] && $this->input->post()["Password"]==$user["password"] ){

        $data["user_id"]=$user["user_id"];
        $v = $this->Authentication_model->get_data($user['username']);
        if($v['n_times'] != 0) {
           $x = $this->Authentication_model->get_album($data["user_id"]);
           foreach ($x as $key) {
              $z = $this->Authentication_model->get_photo($key['photo_album_id']);
              foreach ($z as $e) {
                  var_dump(date_diff($e['photo_date'],date("YYYY/mm/dd")));die();
                  if(date_diff($e['photo_date'],date("YYYY/mm/dd")) >= $v['n_times']) {
                    $this->User_model->delete_photo($e['photo_id']);
                  }
                }  
           }
        }
      }
    }

      if(count($data["user_id"])){
        $this->load->view('login');
      }

    redirect("User/logged/".$data["user_id"]);

   }
   else{
    $this->load->view('login');
   }
   
    
  }

}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

  
  public function index(){
    

    $this->load->view('login');
    
  }

  public function logout() {
    $this->load->model('Data_model');
    $this->Data_model->close_session();
    redirect("https://keops-web1.herokuapp.com/");
  }

  public function log(){
    $this->load->model('User_model');
    $this->load->model('Authentication_model');

   if($this->input->post()){

    $data["users"] = $this->User_model->get_all_users();

    foreach ($data["users"] as $user) {
      if($this->input->post()["Username"]==$user["user_name"] && $this->input->post()["Password"]==$user["password"] ){
        $this->load->model('Data_model');
        $this->Data_model->open_session($user["user_id"]);
        var_dump($this->Data_model->get_session());die();
        $data["user_id"]=$user["user_id"];

        $v = $this->Authentication_model->get_data($user['user_name']);
        
        if($v['n_times'] != 0) {
           $x = $this->Authentication_model->get_album($data["user_id"]);
           foreach ($x as $key) {
              $z = $this->Authentication_model->get_photo($key['album_id']);
              foreach ($z as $e) {
                  $date = new DateTime($e['photo_date']);
                  $date2 = new DateTime(date("Y/m/d"));
                  $temp = date_diff($date,$date2);
                  if($temp->y>0 OR $temp->m>0 OR $temp->d >= $v['n_times']) {
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

    redirect("User/logged/");

   }
   else{
    $this->load->view('login');
   }
   
    
  }

}


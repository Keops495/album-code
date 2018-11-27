<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

  
  public function index(){
    
    $this->load->view('login');
    
  }

  public function logout($user_id) {
    $this->load->model('Data_model');
    $this->Data_model->close_session($user_id);
    redirect("https://keops-web1.herokuapp.com/");
  }

  public function log(){
    $this->load->model('Data_model');
    $this->load->model('User_model');
    $this->load->model('Authentication_model');

    if(isset($this->session->userdata['user']['user_id'])){
       
      redirect("User/logged/");
     
    }
    else{
      
      if($this->input->post()){
        
        $admin = $this->Data_model->getAdmin($this->input->post());

        if(empty($admin)){

          redirect("https://keops-web1.herokuapp.com/");
        }
        else{
          $this->session->set_userdata('admin',$admin);

          $data["users"] = $this->User_model->get_all_users();

          foreach ($data["users"] as $user) {
            if($this->input->post()["Username"]==$user["user_name"] && $this->input->post()["Password"]==$user["password"] ){
              
              $this->Data_model->open_session($user["user_id"]);
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

          //redirect("User/logged/".$this->session->userdata['user']['user_id']);
        }
      }
      else{
        $this->load->view('login');
      }
    }

    
  }

  public function out(){
    $this->session->sess_destroy();
    redirect("https://keops-web1.herokuapp.com/");
  }

}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

  public function users(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_users());
  }

   public function photos(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_photosa());
  }

   public function likes(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_likes());
  }
    public function all() {
      $this->load->model('Data_model');
      $this->load->model('User_model');
      $data['photos'] = $this->Data_model->get_all_photosa();
      for ($j=0; $j <count($data['photos']) ; $j++) { 
        $data['photos'][$j]['likes'] = $this->Data_model->get_likes($data["photos"][$j]["photo_id"]);
        $data['photos'][$j]["key"]=$this->User_model->get_key($data["photos"][$j]["photo_id"]);
        for ($i=0; $i < count($data['photos'][$j]["likes"]) ; $i++) { 
          $data['photos'][$j]["likes"][$i]['name'] =$this->Data_model->get_name($data['photos'][$j]['likes'][$i]['like_user_id'])['name'];
          $data['photos'][$j]["likes"][$i]['surname'] =$this->Data_model->get_surname($data['photos'][$j]['likes'][$i]['like_user_id'])['surname'];
        }
      }
      echo json_encode($data);
    }

   public function albums(){
    $this->load->model('Data_model');
    echo json_encode($this->Data_model->get_all_albums());
  }

    public function signup() {
      $this->load->model('Data_model');
      $temp = json_decode($_POST);
      $this->Data_model->new_user($temp);
    }

}


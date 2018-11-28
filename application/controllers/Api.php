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
      $data = $this->Data_model->get_all_photosa();
      for ($j=0; $j <count($data) ; $j++) { 
        $data[$j]['likes'] = $this->Data_model->get_likes($data[$j]["photo_id"]);
        $data[$j]["key"]=$this->User_model->get_key($data[$j]["photo_id"]);
        for ($i=0; $i < count($data[$j]["likes"]) ; $i++) { 
          $data[$j]["likes"][$i]['name'] =$this->Data_model->get_name($data[$j]['likes'][$i]['like_user_id'])['name'];
          $data[$j]["likes"][$i]['surname'] =$this->Data_model->get_surname($data[$j]['likes'][$i]['like_user_id'])['surname'];
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
      $temp = json_decode(file_get_contents("php://input"), TRUE);
      $this->Data_model->new_user($temp);
    }

}


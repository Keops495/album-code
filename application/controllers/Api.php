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
    public function get_photo() {
      $this->load->model('Data_model');
      $id = json_decode(file_get_contents("php://input"), TRUE);
      $data = $this->Data_model->photo($id['id']);
      $data['likes'] = $this->Data_model->get_likes($data["photo_id"]);
      for ($i=0; $i < count($data["likes"]) ; $i++) { 
        $data["likes"][$i]['name'] =$this->Data_model->get_name($data['likes'][$i]['like_user_id'])['name'];
        $data["likes"][$i]['surname'] =$this->Data_model->get_surname($data['likes'][$i]['like_user_id'])['surname'];
      }
      echo json_encode($data);
    }

    public function like_photo() {
      $this->load->model('Data_model');
      $temp = json_decode(file_get_contents("php://input"), TRUE);
      $this->Data_model->like_photo($temp['user_id'],$temp['photo_id']);
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

    public function add_photo() {
      $this->load->model('User_model');
      $temp = json_decode(file_get_contents("php://input"), TRUE);
      $this->User_model->add_more_photo($temp['albumId'],$temp);
      $photo_id=$this->User_model->get_photo_id_from_url($temp);
      $this->User_model->add_key_photo($photo_id,$temp);
    }

    public function add_album() {
      $this->load->model('User_model');
      $temp = json_decode(file_get_contents("php://input"), TRUE);
      $this->User_model->add_more_album($temp['user_id'],$temp);
    }

    public function update_n() {
      $this->load->model('Data_model');
      $temp = json_decode(file_get_contents("php://input"), TRUE);
      $this->User_model->n_change($temp['user_id'],$temp['n']);
    }

}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function logged()
	{
	    $this->load->model('User_model');
	    $this->load->model('Data_model');
	    $user_id = $this->Data_model->get_session();
	    var_dump($user_id);die();
	    if(!isset($user_id))
	    	redirect("https://keops-web1.herokuapp.com/");

	    $data['name'] =$this->Data_model->get_name($user_id)['name'];
	    $data['surname'] =$this->Data_model->get_surname($user_id)['surname'];
	    $data['n_times'] =$this->Data_model->get_n($user_id)['n_times'];

	    $data["albums"]=$this->User_model->get_user_album($user_id);

	    for ($i=0; $i <count($data["albums"]); $i++) { 

	    	$data["albums"][$i]["one_photo"]=$this->User_model->get_one_photo($data["albums"][$i]["album_id"]);
	    }

	    for ($i=0; $i < count($data["albums"]) ; $i++) { 
	    	if($data["albums"][$i]["one_photo"]["photo_url"]==""){
	    		$data["albums"][$i]["one_photo"]["photo_url"]="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png";
	    	}
	    }

	    $data["user_id"]=$user_id;

		$this->load->view('user_detail',$data);
	}

	public function signup() {
		$this->load->model("Data_model");
		if ($this->input->post()) {
			$temp = $this->input->post();
			$this->Data_model->new_user($temp);
			redirect("https://keops-web1.herokuapp.com/");
		} else {
			$this->load->view("signup");
		}
	}

	public function detail_album($album_id)
	{
	    $this->load->model('User_model');
	    $this->load->model("Data_model");
	    $user_id = $this->Data_model->get_session()['id'];
	    if(!isset($user_id))
	    	redirect("https://keops-web1.herokuapp.com/");

	    $data["album"]=$this->User_model->get_album($album_id);

	    $data["photos"]=$this->User_model->get_photos($album_id);

	    for ($i=0; $i <count($data["photos"]) ; $i++) {

	    	$data["photos"][$i]["key"]=$this->User_model->get_key($data["photos"][$i]["photo_id"]);
	    }

	    $data["album_id"]=$album_id;

	    $data["user_id"]=$data["album"]["album_user_id"];

		$this->load->view('album_detail',$data);
	}

	public function delete_photo($photo_id)
	{

	    $this->load->model('User_model');

	    $album_id=$this->User_model->get_album_id_with_photo($photo_id)["photo_album_id"];

	    $this->User_model->delete_photo($photo_id);	    

		redirect("User/detail_album/".$album_id);
	}

	public function add_album($user_id)
	{

	    $data["user_id"]=$user_id;

		$this->load->view('add_album',$data);
	}

	public function create_album($user_id)
	{

	    $this->load->model('User_model');

	    $this->User_model->add_more_album($user_id,$this->input->post());

	    $data["user_id"]=$user_id;

		redirect("User/logged/".$data["user_id"]);


	}
	public function add_photo($album_id)
	{

	    $data["album_id"]=$album_id;

		$this->load->view('add_photograph',$data);


	}

	public function create_photo($album_id)
	{
		
	    $this->load->model('User_model');

	    $this->User_model->add_more_photo($album_id,$this->input->post());

	    $photo_id=$this->User_model->get_photo_id_from_url($this->input->post());

	    $this->User_model->add_key_photo($photo_id["photo_id"],$this->input->post());

	    $data["album_id"]=$album_id;

		redirect("User/detail_album/".$data["album_id"]);


	}

	public function search_key($album_id)
	{

	    $this->load->model('User_model');

	    $data["album"]=$this->User_model->get_album($album_id);

	    $data["photos"]=$this->User_model->get_photos_with_key($album_id,$this->input->post());

	    $data["key"]=$this->input->post()["Key"];

	    for ($i=0; $i <count($data["photos"]) ; $i++) {

	    	$data["photos"][$i]["key"]=$this->User_model->get_key($data["photos"][$i]["photo_id"]);
	    }

	    $data["album_id"]=$album_id;

	    $data["user_id"]=$data["album"]["album_user_id"];

		$this->load->view('album_detail',$data);


	}



}

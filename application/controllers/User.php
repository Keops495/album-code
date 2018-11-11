<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function logged($user_id)
	{
	    $this->load->model('User_model');

	    $data["albums"]=$this->User_model->get_user_album($user_id);

	    $data["one_photo"]==$this->User_model->get_one_photo($data["albums"]["album_id"]);

		$this->load->view('user_detail',$data);
	}

	public function detail_album($album_id)
	{
	    $this->load->model('User_model');

	    $data["album"]=$this->User_model->get_album($album_id);

	    $data["photos"]=$this->User_model->get_photos($album_id);

		$this->load->view('album_detail',$data);
	}

	public function delete_photo($photo_id)
	{
	    $this->load->model('User_model');

	    $this->User_model->delete_photo($photo_id);

		$this->load->view('album_detail',$data);
	}


}

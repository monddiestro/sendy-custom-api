<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function subscribe() {

		$time = time();
		$join_date = round(time()/60)*60;

		$email = $this->input->post('email');
		// load model
		$this->load->model('sendy_model');

		// check if exist
		$count = $this->sendy_model->pull_email($email);

		if($count == 0) {
			$data = array(
				'userID' => '1',
				'email' => $email,
				'custom_fields' => '',
				'list' => '3',
				'join_date' => $join_date,
				'timestamp' => $time
			);
	
			// pass data to model
			$this->sendy_model->push_data($data);
		} else {
			$data = array(
				'unsubscribed' => 0
			)
			$this->sendy_model->push_update($data,$email);
		}

	}
}

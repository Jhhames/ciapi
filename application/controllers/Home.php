<?php
defined('BASEPATH') or exit('No direct scripts allowed beyond this point');
	class Home extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('file', 'url', 'form','json_output_helper'));
			$this->load->library('form_validation');
			$this->load->model('Main');
		}

		public function index()
		{
			$this->load->view('index');
		}

		public function endpoint()
		{
			$method = $_SERVER['REQUEST_METHOD'];
			if ($method != 'POST')
			{
				return json_output(405, array('status' => 405, 'message' => 'Bad Request'));
			}
			else
			{	
				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required');
				if( $this->form_validation->run() == false){
					$message = 'Form validation error';
					return json_output(400, array('status' => 400, 'message' => $message, 'error' => validation_errors()));
				}
				else{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					if($username== 'james' && $password == 'password'):
						$status = 200;
						$response = 'Login Successful';
						$message = 'Welcome';
					else:
						$status = 400;
						$response = 'Invalid Username or password';
						$message = 'Try again';						
					endif;				
					
					return json_output($status, array('status' => $status, 'message' => $message, 'response' => $response));
				}

			}
		}
	
	
	}
?>
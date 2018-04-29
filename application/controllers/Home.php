<?php
defined('BASEPATH') or exit('No direct scripts allowed beyond this point');
	class Home extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('file', 'url', 'form'));
		}

		public function index()
		{
			$this->load->view('index');
		}
	}
?>
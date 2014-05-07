<?php
	class login extends CI_Controller
	{
		public function index()
		{
			$this->load->helper('form');

			$account = $this->input->post('username');
			$password = $this->input->post('password');
			$data['Account'] = $account;

			if ($this->input->post('access') == 'staff')
			{
				$this->load->model('instructor_model');
				$result = $this->instructor_model->inslogin($account, $password);
				if($result)
				{
					$this->load->view('ins_index', $data);
				}
				else
				{
					echo '<script>alert("Incorrect account or password")</script>';
					$this->load->view('login');
				}
			}
			else if ($this->input->post('access') == 'student')
			{
				$this->load->model('ta_model');
				$result = $this->ta_model->talogin($account, $password);
				if($result)
				{
					$this->load->view('ta_index', $data);
				}
				else
				{
					echo '<script>alert("Incorrect account or password")</script>';
					$this->load->view('login');
				}
			}
			else /*Administrator login*/
			{
				$this->load->model('administrator');
				$result = $this->administrator->userlogin($account, $password);
				if($result)
				{
					$this->load->view('admin_index', $data);
				}
				else
				{
					echo '<script>alert("Incorrect account or password")</script>';
					$this->load->view('login');
				}

			}
		}
	}

//This is the end of this file
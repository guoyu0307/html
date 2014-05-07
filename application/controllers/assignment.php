<?php
	class assignment extends CI_Controller
	{
		public function list_assignment()
		{
			$this->load->view('assignment_list');
		}

		public function direct_add_assignment()
		{
			$this->load->view('add_assignment');
		}

		public function add_assignment()
		{
			$course_offial_id = $this->input->post('courseID');
			$year = $this->input->post('year');
			$term = $this->input->post('term');
			$ta_mail = $this->input->post('taemail');

			$course_id = 0;

			$this->load->model('course_offering');
			$this->load->model('course_entity');
			$this->load->model('ta_model');
			$this->load->model('assignment_model');
			$this->load->model('instructor_model');
			$this->load->model('instructor_course');

			//Search Inner ID from course entity
			$course_inner_id = $this->course_entity->search_course_OID($course_offial_id);

			if($course_inner_id->num_rows() < 1)
			{
				echo '<script>alert("This course does not exist!")</script>';
				return;
			}
			else
			{
				foreach ($course_inner_id->result() as $row) 
				{
					$course_id = $row->Course_ID;
				}
			}

			//Search if the offering course exist
			$course_result = $this->course_offering->serarch_courseoff($course_id, $year, $term);
			$ins_id = 0;

			if($course_result->num_rows() < 1)
			{
				echo '<script>alert("This course does not exist in the offering course!")</script>';
				return;
			}
			else
			{
				$ins_result = $this->instructor_course->search_ins_id($course_id, $year, $term);
				foreach ($ins_result->result() as $row) 
				{
					# code...
					$ins_id = $row->Instructor_ID;
				}
			}

			//Search if the TA exist
			$ta_result = $this->ta_model->search_ta_email($ta_mail);

			if($ta_result->num_rows() < 1)
			{
				echo '<script>alert("This TA does not exist!")</script>';
				return;
			}
			else
			{
				foreach ($ta_result->result() as $row) 
				{
					$info_array = array('TA_ID' => $row->TA_ID,
										'Instructor_ID' => $ins_id,
										'Course_ID' => $course_id,
										'Year' => $year,
										'Term' => $term);
					if($this->assignment_model->insert_assignment($info_array))
					{
						echo '<script>alert("Insert Succssed!")</script>';
					}
					
				}
			}
		}

		public function list_all_assignment()
		{
			$this->load->model('assignment_model');
			$this->load->model('course_entity');
			$this->load->model('ta_model');
			$this->load->model('instructor_model');

			$this->load->library('pagination');
			$this->load->helper('url');

			$this->load->model('course_entity');

			$config['base_url'] = base_url().'index.php/assignment/list_all_assignment/';
			$config['total_rows'] = $this->db->count_all('Assignment');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'Instructor', 'Instructor Email', 'TA', 'TA_Email');
    		
    		$results = $this->assignment_model->search_all_assignment($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();

    			$course_offical_id = 0;
    			$course_name = '';
    			$ta_name = '';
    			$ta_email = '';
    			$ins_name = '';
    			$ins_email = '';

    			//get course offical ID and name
    			$result_oid = $this->course_entity->search_course_ID($row->Course_ID);
    			foreach ($result_oid->result() as $key) 
    			{
    				$course_offical_id = $key->Course_Offical_ID;
    				$course_name = $key->Course_Name;
    			}

    			//get ta name and email
    			$result_ta = $this->ta_model->search_TA($row->TA_ID);
    			foreach ($result_ta->result() as $key) 
    			{
    				# code...
    				$ta_name = $key->TA_Name;
    				$ta_email = $key->TA_Email;
    			}

    			//get ins name and email
    			$result_ins = $this->instructor_model->search_instructor($row->Instructor_ID);
    			foreach ($result_ins->result() as $key) 
    			{
    				# code...
    				$ins_name = $key->Instructor_Name;
    				$ins_email = $key->Instructor_Email;
    			}

    			$newr[] = $course_offical_id;
    			$newr[] = $course_name;
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;
    			$newr[] = $ins_name;
    			$newr[] = $ins_email;
    			$newr[] = $ta_name;
    			$newr[] = $ta_email;

    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
    		$this->load->view('assignment_list', $data);
		}
	}
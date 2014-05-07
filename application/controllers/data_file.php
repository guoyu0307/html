<?php
	class data_file extends CI_Controller
	{
		public function file_view()
		{
      $this->load->view('file');
		}

		public function file_upload()
		{
			$config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;

  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				//echo '<script>alert("Error!")</script>';
  				$this->add_new_course();
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$this->read_excel($new_name);
  			}

  			$this->load->view('add_new_course');
		}

		public function read_excel($filename)
		{
			date_default_timezone_set('Asia/Shanghai');
			set_include_path(get_include_path() . PATH_SEPARATOR . '/Library/WebServer/Documents/html/application/PHPExcel_1.8.0_pdf/Classes/');
			include 'PHPExcel/IOFactory.php';
			$inputFileName = '/Library/WebServer/Documents/html/application/upload/'.$filename.'.xlsx';
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

			$sheetdata = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			//var_dump($sheetdata);
			return $sheetdata;
		}

		public function get_file()
		{
			$type = $this->input->post('type');

			$config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;

  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				echo '<script>alert("Updata Error!")</script>';
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$data = $this->read_excel($new_name);
  				//var_dump($data[1]);
  				//echo count($data);
  				unset($data[1]);
  				$this->insert_course($data);
  			}
		}

		public function insert_course($data)
		{
			$this->load->model('course_entity');

      foreach ($data as $key => $value) 
      {
        $result = $this->course_entity->search_course_OID($value['A']);
        if($result->num_rows() > 0)
        {
          echo 'The course '.$value['A'].' has existed.'."/n";
        }
        else
        {
          $info = array('Course_Offical_ID' => $value['A'],
                        'Course_Used_ID' => $value['B'],
                        'Course_Name' => $value['C'],
                        'Credits' => $value['D'],
                        'Comment' => $value['E']);
          $aaa = $this->course_entity->insert_course($info);
        }
      }

      echo '<script>alert("Upload succeed!")</script>';
		}

    public function export_data()
    {
      date_default_timezone_set('Asia/Shanghai');
      set_include_path(get_include_path() . PATH_SEPARATOR . '/Library/WebServer/Documents/html/application/PHPExcel_1.8.0_pdf/Classes/');

      include_once 'PHPExcel.php';
      include_once 'PHPExcel/IOFactory.php';
      include_once 'PHPExcel/Writer/IWriter.php';
      include_once 'PHPExcel/Writer/Excel5.php';

      $obj_phpexcel = new PHPExcel();

      $this->load->model('course_entity');
      $result = $this->course_entity->get_all();

      $num = 2;

      $obj_phpexcel->getActiveSheet()->setCellValue('A1', 'Course ID');
      $obj_phpexcel->getActiveSheet()->setCellValue('B1', 'Course Used ID');
      $obj_phpexcel->getActiveSheet()->setCellValue('C1', 'Course Name');
      $obj_phpexcel->getActiveSheet()->setCellValue('D1', 'Credits');
      $obj_phpexcel->getActiveSheet()->setCellValue('E1', 'Comment');

      foreach ($result->result() as $row) 
      {
        $obj_phpexcel->getActiveSheet()->setCellValue('A'.$num, $row->Course_Offical_ID);
        $obj_phpexcel->getActiveSheet()->setCellValue('B'.$num, $row->Course_Used_ID);
        $obj_phpexcel->getActiveSheet()->setCellValue('C'.$num, $row->Course_Name);
        $obj_phpexcel->getActiveSheet()->setCellValue('D'.$num, $row->Credits);
        $obj_phpexcel->getActiveSheet()->setCellValue('E'.$num, $row->Comment);

        $num++;
      }

      $obj_Writer = PHPExcel_IOFactory::createWriter($obj_phpexcel,'Excel5');
      $filename = "outexcel.xls";
        
        header("Content-Type: application/force-download"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Type: application/download"); 
        header('Content-Disposition:inline;filename="'.$filename.'"'); 
        header("Content-Transfer-Encoding: binary"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Pragma: no-cache"); 
        $obj_Writer->save('php://output'); 
    }
	}

/*This is the end of this file*/
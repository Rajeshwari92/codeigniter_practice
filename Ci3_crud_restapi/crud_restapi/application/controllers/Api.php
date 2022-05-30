<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('Api_model');
  $this->load->library('form_validation');
 }

 function index()
 {
  $data = $this->Api_model->fetch_all();
  echo json_encode($data->result_array());
 }
 
 function insert()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'	=>	$this->input->post('name'),
				'location' =>	$this->input->post('location')
			);

			$this->Api_model->insert_api($data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'name_error'		=>	form_error('name'),
				'location_error'		=>	form_error('location')
			);
		}
		echo json_encode($array);
	}

	function fetch_single()
	{
		if($this->input->post('id'))
		{
			$data = $this->Api_model->fetch_single_user($this->input->post('id'));

			foreach($data as $row)
			{
				$output['name'] = $row['name'];
				$output['location'] = $row['location'];
			}
			echo json_encode($output);
		}
	}

	function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('location', 'Location', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'name'		=>	$this->input->post('name'),
				'location'	=>	$this->input->post('location')
			);

			$this->Api_model->update_api($this->input->post('id'), $data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'				=>	ture,
				'name_error'	=>	form_error('name'),
				'location_error'	=>	form_error('location')
			);
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			if($this->Api_model->delete_single_user($this->input->post('id')))
			{
				$array = array(

					'success'	=>	true
				);
			}
			else
			{
				$array = array(
					'error'		=>	true
				);
			}
			echo json_encode($array);
		}
	}

}
?>
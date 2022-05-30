<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller {

 function index()
 {
  $this->load->view('api_view');
 }

 function action()
 {
  if($this->input->post('data_action'))
  {
   $data_action = $this->input->post('data_action');

   if($data_action == "Delete")
			{
				$api_url = "http://localhost/crud_restapi/api/delete";

				$form_data = array(
					'id' =>	$this->input->post('person_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;

			}


   if($data_action == "Edit")
			{
				$api_url = "http://localhost/crud_restapi/api/update";

				$form_data = array(
					'name'		=>	$this->input->post('name'),
					'location'			=>	$this->input->post('location'),
					'id'				=>	$this->input->post('person_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;

			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/crud_restapi/api/fetch_single";

				$form_data = array(
					'id'		=>	$this->input->post('person_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}


   if($data_action == "Insert")
   {
       $api_url = "http://localhost/crud_restapi/api/insert";
   

       $form_data = array(
           'name'		=>	$this->input->post('name'),
           'location'	=>	$this->input->post('location')
       );

       $client = curl_init($api_url);

       curl_setopt($client, CURLOPT_POST, true);

       curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

       curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

       $response = curl_exec($client);

       curl_close($client);

       echo $response;


   }



   if($data_action == "fetch_all")
   {
    $api_url = "http://localhost/crud_restapi/api";

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    $result = json_decode($response);

    $output = '';

    if(count($result) > 0)
    {
     foreach($result as $row)
     {
      $output .= '
      <tr>
       <td>'.$row->name.'</td>
       <td>'.$row->location.'</td>
       <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button>
	   <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
      </tr>

      ';
     }
    }
    else
    {
     $output .= '
     <tr>
      <td colspan="4" align="center">No Data Found</td>
     </tr>
     ';
    }

    echo $output;
   }
  }
 }
 
}

?>
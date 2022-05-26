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
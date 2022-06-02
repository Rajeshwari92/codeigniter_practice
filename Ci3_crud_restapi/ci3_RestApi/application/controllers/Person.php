<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require './application/libraries/RestController.php';
use chriskacerguis\RestServer\RestController;
class Person extends RestController {

    public function __construct()
 {
  parent::__construct();
  $this->load->model('Person_model');
 }
 public function index_get()
 {
  $this->response([
      'status' => 200,
      'data' => $this->Person_model->getPerson()
  ],RestController::HTTP_OK);
 }

 public function index_post()
 {
      $data =['name'=> $this->post('name'),
      'location' => $this->post('location')
 ];
 if($this->Person_model->postPerson($data)>0){
    $this->response([
        'status' => 200,
        'message' => 'success'
    ],RestController::HTTP_OK);
 }else{
    $this->response([
        'status' => 404,
        'message' => 'failed!'
    ],RestController::HTTP_BAD_REQUEST);
 }
 }

 public function index_delete()
 {
     $id = $this->delete('id');
     if($this->Person_model->deletePerson($id) >0){
  $this->response([
      'status' => 200,
      'message' => 'successfully deleted'
  ],RestController::HTTP_OK);
}else{
    $this->response([
        'status' => 404,
        'message' => 'failed!'
    ],RestController::HTTP_BAD_REQUEST);
 }
 }

 public function index_put()
 {
     $id = $this->put('id');
     $data =['name'=> $this->put('name'),
     'location' => $this->put('location')
];
     if($this->Person_model->updatePerson($id, $data) >0){
  $this->response([
      'status' => 200,
      'message' => 'successfully updated'
  ],RestController::HTTP_OK);
}else{
    $this->response([
        'status' => 404,
        'message' => 'failed!'
    ],RestController::HTTP_BAD_REQUEST);
 }
 }
}
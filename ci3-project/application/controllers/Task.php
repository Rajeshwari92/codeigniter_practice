<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->database();
    }

  public function index()
  {
    $tasks = $this->db->get('person_info')->result();
    $this->load->view('task/index', ['tasks' => $tasks]);
  }

  public function create()
  {

    $this->load->view('task/create');
  }

  public function edit($id)
  {
    $task = $this->db->where(['id' => $id])->get('person_info')->row();
    $this->load->view('task/edit', ['task' => $task]);
  }

  public function store()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('location', 'Location','required');

      if ($this->form_validation->run()) {
        $task = array (
          'name' => $this->input->post('name'),
          'location' => $this->input->post('location'),
        );

        $this->db->insert('person_info', $task);
      } else {
        $errors = $this->form_validation->error_array();
        $this->session->set_flashdata('errors', $errors);
        redirect(base_url('index.php/task/create'));
      }

      redirect('index.php/task');
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('location', 'Location', 'required');

    if ($this->form_validation->run()) {
      $task = array (
        'name' => $this->input->post('name'),
        'location' => $this->input->post('location'),
      );

       $this->db->where(['id' => $id])->update('person_info', $task);
    } else {
      $errors = $this->form_validation->error_array();
      $this->session->set_flashdata('errors', $errors);
      redirect(base_url('index.php/task/edit/'. $id));
    }

     redirect('index.php/task');
  }

  public function show($id) {
     $task = $this->db->where(['id' => $id])->get('person_info')->row();
     $this->load->view('task/show',['task' => $task]);
  }

  public function delete($id)
  {
     $this->db->where(['id' => $id])->delete('person_info');

     redirect('index.php/task');
  }

}
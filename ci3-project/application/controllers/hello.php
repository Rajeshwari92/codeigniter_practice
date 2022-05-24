<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Hello extends CI_Controller {  
      
    public function index()  
    {  
        $this->load->view('hello_world');  
    }  
    public function hello_controller()  
    {  
        $this->load->view('hello');  
    }  
}  
?>  
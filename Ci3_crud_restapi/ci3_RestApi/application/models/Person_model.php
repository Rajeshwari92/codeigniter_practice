<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Controller {

    function getPerson()
    {
     return $this->db->get('person_info')-> result_array();
    }

    function postPerson($data)
    {
     $this->db->insert('person_info', $data);
     return $this->db->affected_rows();
    }

    function deletePerson($id)
    {
     $this->db->delete('person_info',['id' => $id]);
     return $this->db->affected_rows();
    }

    function updatePerson($id, $data)
    {
        $this->db->where('id' , $id);
     $this->db->update('person_info', $data);
     return $this->db->affected_rows();
    }
}
?>
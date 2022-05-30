<?php
class Api_model extends CI_Model
{
 function fetch_all()
 {
  $this->db->order_by('id', 'DESC');
  return $this->db->get('person_info');
 }

 function insert_api($data)
 {
   $this->db->insert('person_info', $data);
 }

 function fetch_single_user($person_id)
	{
		$this->db->where('id', $person_id);
		$query = $this->db->get('person_info');
		return $query->result_array();
	}

	function update_api($person_id, $data)
	{
		$this->db->where('id', $person_id);
		$this->db->update('person_info', $data);
	}

  function delete_single_user($person_id)
	{
		$this->db->where('id', $person_id);
		$this->db->delete('person_info');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
	protected $table = 'person_info';

	protected $primaryKey = 'id';

	protected $allowedFields = ['name', 'location'];

}

?>
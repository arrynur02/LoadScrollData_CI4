<?php namespace App\Models;

Class Product_model extends \CodeIgniter\Model
{
	public function __construct()
	{
		// parent::__construct();
		$this->build =  db_connect();
	}
	public function getAllRecords($limit , $start)
	{
		$query_records = $this->build->table('product')
			->select('*')
			->orderBy('Product_id' , 'DESC')
			->limit($limit , $start)
			->get();
		return $query_records->getResultArray();
	}
}
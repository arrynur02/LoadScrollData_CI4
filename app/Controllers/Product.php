<?php namespace App\Controllers;

use App\Models\Product_model;

Class Product extends \CodeIgniter\Controller
{
	public function __construct()
	{
		$this->Product_models = new Product_model();
	}
	public function index()
	{
		return view('Product/View');
	}
	public function ShowsRecords()
	{
		$start = $this->request->getpost('start');
		$limit = $this->request->getpost('limit');

		$Product = $this->Product_models->getAllRecords($limit , $start);
		$x['Products'] = $this->Product_models->getAllRecords($limit , $start);
		$enc_json['records_'] = empty($Product);
		$enc_json['records'] = view('Product/Data',$x);
		echo json_encode($enc_json , true);
	}
	// public function ShowsRecordsByKeywords()
	// {
	// 	$search = $this->request->getpost('search');
	// 	$x['Products'] = $this->Product_models->getRecordsByKeywords($search);
	// 	$enc_json['records'] = view('Product/Data',$x);
	// 	echo json_encode($enc_json , true);
	// }
}
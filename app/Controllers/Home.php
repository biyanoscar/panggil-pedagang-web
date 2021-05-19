<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Home extends BaseController
{
	protected $categoryModel;

	public function __construct()
	{
		$this->categoryModel = new CategoryModel();
	}

	public function index()
	{
		$categories_list = $this->categoryModel->getCategory();
		$data = [
			'categories_list' => $categories_list,
		];
		// dd($categories_list);
		return view('home/home', $data);
	}

	//--------------------------------------------------------------------

}

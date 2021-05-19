<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MerchantModel;

class Listing extends BaseController
{
    protected $categoryModel;
    protected $merchantModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->merchantModel = new MerchantModel();
    }

    public function index()
    {
        return view('listing/listing');
    }

    public function category($slug)
    {
        $category = $this->categoryModel->getCategory($slug);
        $merchants = $this->merchantModel->getByCategory($category['category_id']);
        // dd($merchants);
        $categories_list = $this->categoryModel->getCategory();
        $data = [
            'categories_list' => $categories_list,
            'category_name' => $category['category_name'],
            'merchants' => $merchants->paginate(10, 'merchants'),
            'pager' => $merchants->pager
        ];
        // return $slug;
        return view('listing/listing', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $merchants = $this->merchantModel->search($keyword);
        } else {
            $merchants = $this->merchantModel;
        }
        $categories_list = $this->categoryModel->getCategory();

        // dd($merchants);
        $data = [
            'categories_list' => $categories_list,
            'category_name' => 'All',
            'merchants' => $merchants->paginate(10, 'merchants'),
            'pager' => $merchants->pager
        ];
        // return $slug;
        return view('listing/listing', $data);
    }

    //--------------------------------------------------------------------

}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories_list = $this->categoryModel->getCategory();
        // dd($categories_list);
        $data = [
            'categories_list' => $categories_list,
        ];

        return view('admin/categories/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/categories/create', $data);
    }

    public function insert()
    {
        //validasi input gambar
        if (!$this->validate([
            'category_img' => [
                'rules' => 'max_size[category_img,1024]|is_image[category_img]|mime_in[category_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large',
                    'is_image' => 'What you chose is not an image',
                    'mime_in' => 'What you chose is not an image',
                ]
            ]
        ])) {
            return redirect()->to('/admin/categories/create/')->withInput();
        }


        $fileImg = $this->request->getFile('category_img');
        //cek gambar, apakah gambar lama
        if ($fileImg->getError() == 4) {
            $namaImg = 'default.jpg';
        } else {
            $fileImg->move('images/categories/');
            $namaImg = $fileImg->getName();
        }


        $slug = url_title($this->request->getVar('category_name'), '-', true);
        $this->categoryModel->insert([
            'category_name' => $this->request->getVar('category_name'),
            'category_slug' => $slug,
            'category_img' => $namaImg,
        ]);


        session()->setFlashdata('pesan', 'Data added successfully');

        return redirect()->to('/admin/categories');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        $data = [
            'category' => $category,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/categories/edit', $data);
    }

    public function update($id)
    {
        //validasi input gambar
        if (!$this->validate([
            'category_img' => [
                'rules' => 'max_size[category_img,1024]|is_image[category_img]|mime_in[category_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large',
                    'is_image' => 'What you chose is not an image',
                    'mime_in' => 'What you chose is not an image',
                ]
            ]
        ])) {
            return redirect()->to('/admin/categories/edit/' . $id)->withInput();
        }


        $fileImg = $this->request->getFile('category_img');
        //cek gambar, apakah gambar lama
        if ($fileImg->getError() == 4) {
            $namaImg = $this->request->getVar('imgLama');
        } else {
            //pindahkan gambar
            $fileImg->move('images/categories/');
            $namaImg = $fileImg->getName();
            //hapus file yang lama
            unlink('images/categories/' . $this->request->getVar('imgLama'));
        }


        $slug = url_title($this->request->getVar('category_name'), '-', true);
        $this->categoryModel->save([
            'category_id' => $id,
            'category_name' => $this->request->getVar('category_name'),
            'category_slug' => $slug,
            'category_img' => $namaImg,
        ]);


        session()->setFlashdata('pesan', 'Data changed successfully');

        return redirect()->to('/admin/categories');
    }


    public function delete($id)
    {
        //cari berdasarkan id
        $category = $this->categoryModel->find($id);

        //cek jika file gambarnya default.jpg
        if ($category['category_img'] != 'default.jpg') {
            //hapus gambar
            unlink('images/categories/' . $category['category_img']);
        }

        $this->categoryModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('/admin/categories');
    }
}

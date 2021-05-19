<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MerchantModel;
use App\Models\CategoryModel;

class Merchants extends BaseController
{
    protected $merchantModel;
    protected $categoryModel;

    function __construct()
    {
        $this->merchantModel = new MerchantModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $merchants_list = $this->merchantModel->getAll();
        // dd($merchants_list);
        $data = [
            'merchants_list' => $merchants_list,
        ];

        return view('admin/merchants/index', $data);
    }

    public function create()
    {
        $categories_list = $this->categoryModel->getCategory();
        $data = [
            'categories_list' => $categories_list,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/merchants/create', $data);
    }

    public function insert()
    {
        //validasi input gambar
        if (!$this->validate([
            'merchant_name' => [
                'rules' => 'required',
            ],
            'category_id' => [
                'rules' => 'required',
            ],
            'merchant_img' => [
                'rules' => 'max_size[merchant_img,1024]|is_image[merchant_img]|mime_in[merchant_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large',
                    'is_image' => 'What you chose is not an image',
                    'mime_in' => 'What you chose is not an image',
                ]
            ]
        ])) {
            return redirect()->to('/admin/merchants/create/')->withInput();
        }


        $fileImg = $this->request->getFile('merchant_img');
        //cek gambar, jika kosong langsung default
        if ($fileImg->getError() == 4) {
            $namaImg = 'default.jpg';
        } else {
            $fileImg->move('images/listings/');
            $namaImg = $fileImg->getName();
        }


        $slug = url_title($this->request->getVar('merchant_name'), '-', true);
        $this->merchantModel->insert([
            'merchant_name' => $this->request->getVar('merchant_name'),
            'category_id' => $this->request->getVar('category_id'),
            'merchant_address' => $this->request->getVar('merchant_address'),
            'merchant_phone' => $this->request->getVar('merchant_phone'),
            'merchant_email' => $this->request->getVar('merchant_email'),
            'merchant_slug' => $slug,
            'merchant_img' => $namaImg,
        ]);


        session()->setFlashdata('pesan', 'Data added successfully');

        return redirect()->to('/admin/merchants');
    }

    public function edit($id)
    {
        $merchant = $this->merchantModel->find($id);
        $categories_list = $this->categoryModel->getCategory();
        $data = [
            'merchant' => $merchant,
            'categories_list' => $categories_list,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/merchants/edit', $data);
    }

    public function update($id)
    {
        //validasi input gambar
        if (!$this->validate([
            'merchant_name' => [
                'rules' => 'required',
            ],
            'category_id' => [
                'rules' => 'required',
            ],
            'merchant_img' => [
                'rules' => 'max_size[merchant_img,1024]|is_image[merchant_img]|mime_in[merchant_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large',
                    'is_image' => 'What you chose is not an image',
                    'mime_in' => 'What you chose is not an image',
                ]
            ]
        ])) {
            return redirect()->to('/admin/merchants/edit/' . $id)->withInput();
        }


        $fileImg = $this->request->getFile('merchant_img');
        //cek gambar, apakah gambar lama
        if ($fileImg->getError() == 4) {
            $namaImg = $this->request->getVar('imgLama');
        } else {
            //pindahkan gambar
            $fileImg->move('images/listings/');
            $namaImg = $fileImg->getName();
            //hapus file yang lama
            unlink('images/listings/' . $this->request->getVar('imgLama'));
        }


        $slug = url_title($this->request->getVar('merchant_name'), '-', true);
        $this->merchantModel->save([
            'merchant_id' => $id,
            'merchant_name' => $this->request->getVar('merchant_name'),
            'category_id' => $this->request->getVar('category_id'),
            'merchant_address' => $this->request->getVar('merchant_address'),
            'merchant_phone' => $this->request->getVar('merchant_phone'),
            'merchant_email' => $this->request->getVar('merchant_email'),
            'merchant_slug' => $slug,
            'merchant_img' => $namaImg,
        ]);


        session()->setFlashdata('pesan', 'Data changed successfully');

        return redirect()->to('/admin/merchants');
    }


    public function delete($id)
    {
        //cari berdasarkan id
        $merchant = $this->merchantModel->find($id);

        //cek jika file gambarnya default.jpg
        if ($merchant['merchant_img'] != 'default.jpg') {
            //hapus gambar
            unlink('images/listings/' . $merchant['merchant_img']);
        }

        $this->merchantModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('/admin/merchants');
    }
}

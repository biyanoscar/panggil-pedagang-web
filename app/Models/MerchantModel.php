<?php

namespace App\Models;

use CodeIgniter\Model;

class MerchantModel extends Model
{
    protected $table = 'merchants';
    protected $primaryKey = 'merchant_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['category_id', 'merchant_name', 'merchant_address', 'merchant_phone', 'merchant_email', 'merchant_slug', 'merchant_img'];

    public function getAll()
    {
        $query = $this->table('merchants')
            ->select('merchants.*, categories.category_name')
            ->join('categories', 'merchants.category_id= categories.category_id')
            ->get();

        return $query->getResultArray();
    }

    public function getMerchant($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['category_slug' => $slug])->first();
    }

    public function getByCategory($categoryId)
    {
        // return $this->where(['category_id' => $categoryId])->findAll();
        return $this->where(['category_id' => $categoryId]);
    }

    public function search($keyword)
    {
        return $this->table('merchants')->like('merchant_name', $keyword)->orLike('merchant_address', $keyword);
    }
}

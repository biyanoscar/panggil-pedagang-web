<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['category_name', 'category_slug', 'category_img'];

    public function getCategory($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['category_slug' => $slug])->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function childrenCategories()
    {
        return $this->hasMany('Category', 'parent_id');
    }

    public function allChildrenCategories()
    {
        return $this->childrenCategories()->with('allChildrenCategories');
    }

    public function Ads() {
        return $this->hasMany(Ad::class);
    }
}

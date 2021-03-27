<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelClass;

class Ad extends ModelClass
{
    use HasFactory;

    protected $guarded = [];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function model() {
        return $this->belongsTo(Model::class);
    }

    public function specs() {
        return $this->belongsToMany(Spec::class);
    }
}

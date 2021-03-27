<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelClass;

class Model extends ModelClass
{
    use HasFactory;
    protected $guarded = [];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function specs() {
        return $this->belongsToMany(Spec::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecName extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specs() {
        return $this->hasMany(Spec::class);
    }
}
